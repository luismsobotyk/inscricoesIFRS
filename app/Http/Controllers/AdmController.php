<?php

namespace App\Http\Controllers;

use App\agenda;
use App\Http\Requests\CourseRequest;
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
        return view('adm.listaUsers');
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

    public function mostraCurso(){
        return view('adm.mostraCurso');
    }

}
