<?php

namespace App\Http\Controllers;

use App\agenda;
use App\extra_info;
use App\Http\Requests\CourseRequest;
use App\Login_log;
use App\Permission;
use App\subscription;
use App\User;
use Request;
use App\Course;

class AdmController extends Controller
{
    public function listarDocumentos(){
        return view('adm.aprovaDocumentos');
    }

    public function listarCursos(){
        $cursos = Course::all();
        return view('adm.cursos')->with('cursos', $cursos);
    }

    public function listarUsuarios(){
        return view('adm.listaUsers')->with('usuarios', User::select('name', 'email', 'id')->orderBy('name')->get());
    }

    public function verUsuario($id){
        $user= User::select('name', 'email', 'created_at')->where('id', $id)->first();
        $lastLogin= Login_log::select('created_at')->where('user_id', $id)->orderBy('created_at', 'DESC')->first();
        $numCursos= subscription::where('user_id', $id)->count();
        $extraInfos= extra_info::select('dateBirth', 'phone')->where('user_id', $id)->first();
        $permissions= Permission::where('user_id', $id)->first();
        return view('adm.user')
            ->with('user', $user)
            ->with('id', $id)
            ->with('lastLogin', $lastLogin)
            ->with('numCursos', $numCursos)
            ->with('extraInfos', $extraInfos)
            ->with('permissions', $permissions);
    }

    public function redirecionaEdicaoPermissao($id, $sucess= false){
        $user= User::select('id', 'name', 'email')->where('id', $id)->first();
        $permissions= Permission::find($id);
        //dd($_SESSION);
        return view('adm.edicaoPermissao')->with('user', $user)->with('permissions', $permissions);
    }

    public function atualizaPermissao(){
        $params= Request::all();
        if(Permission::find($params['user_id'])){
            $permissao= Permission::find($params['user_id']);
        }else{
            $permissao= new Permission();
            $permissao->user_id= $params['user_id'];
        }
        $permissao->registerCourse = $params['registerCourse'];
        $permissao->approveDocuments = $params['approveDocuments'];
        $permissao->viewDashboards = $params['viewDashboards'];
        $permissao->subscriptionCourse= $params['subscriptionCourse'];
        $permissao->editPermissions = $params['editPermissions'];

        $permissao->save();

        return redirect()->back()->with('sucess', ['true']);
        //return redirect()->route('mostraPermissoes', ['id' => $params['user_id'], 'sucess' => 'true']);
        //return redirect()->route('mostraPermissoes', ['id' => $params['user_id'], 'sucess' => 'true']);
    }

    public function mostrarDashboards(){
        return view('adm.dashboards');
    }

    public function redirecionaCadastroCurso(){
        return view('adm.cadastroCurso');
    }

    public function cadastraCurso(CourseRequest $request){
        $params= $request->all();
        $course= Course::create($params);

        foreach ($params['dayWeek'] as $day){
            if($day=='domingo'){
                agenda::create([
                    'dayWeek' => 'Domingo',
                    'startTime' => $params['inicioDomingo'],
                    'endTime' => $params['fimDomingo'],
                    'course_id' => $course->id
                ]);
            }
            else if($day=='segunda-feira'){
                agenda::create([
                    'dayWeek' => 'Segunda-Feira',
                    'startTime' => $params['inicioSegunda'],
                    'endTime' => $params['fimSegunda'],
                    'course_id' => $course->id
                    ]);
            }
            else if($day=='terca-feira'){
                agenda::create([
                    'dayWeek' => 'Terça-Feira',
                    'startTime' => $params['inicioTerca'],
                    'endTime' => $params['fimTerca'],
                    'course_id' => $course->id
                ]);
            }
            else if($day=='quarta-feira'){
                agenda::create([
                    'dayWeek' => 'Quarta-Feira',
                    'startTime' => $params['inicioQuarta'],
                    'endTime' => $params['fimQuarta'],
                    'course_id' => $course->id
                ]);
            }
            else if($day=='quinta-feira'){
                agenda::create([
                    'dayWeek' => 'Quinta-Feira',
                    'startTime' => $params['inicioQuinta'],
                    'endTime' => $params['fimQuinta'],
                    'course_id' => $course->id
                ]);
            }
            else if($day=='sexta-feira'){
                agenda::create([
                    'dayWeek' => 'Sexta-Feira',
                    'startTime' => $params['inicioSexta'],
                    'endTime' => $params['fimSexta'],
                    'course_id' => $course->id
                ]);
            }
            else if($day=='sabado'){
                agenda::create([
                    'dayWeek' => 'Sábado',
                    'startTime' => $params['inicioSabado'],
                    'endTime' => $params['fimSabado'],
                    'course_id' => $course->id
                ]);
            }
        }

        return redirect()->action('AdmController@listarCursos');

    }

    public function deletaCurso($id){
        agenda::where('course_id', $id)->delete();
        Course::find($id)->delete();
        return redirect()->action('AdmController@listarCursos');
    }

    public function mostraCurso($id){
        $agenda= agenda::where('course_id', $id)->get();
        $curso= Course::find($id);

        return view('adm.mostraCurso')
            ->with('curso', $curso)
            ->with('agenda', $agenda)
            ->with('numInscritos', subscription::where('course_id', $id)->count())
            ->with('ultInscritos', subscription::where('course_id', $id)->limit(3)->orderByRaw('created_at DESC'));
    }

}
