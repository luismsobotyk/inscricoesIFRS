<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'vacancies' => 'required|numeric|min:1',
            'workload' => 'required|numeric|gt:0',
            'startSubscription' => 'required|date',
            'endSubscription' => 'required|date|after_or_equal:startSubscription',
            'startCourse' => 'required|date|after_or_equal:startSubscription',
            'endCourse' => 'required|date|after_or_equal:startCourse',
            'dayWeek' => 'required'
        ];

        if (is_array($this->dayWeek)) {
            for ($i = 0; $i < count($this->dayWeek); $i++) {
                if ($this->dayWeek[$i] == 'domingo') {
                    $rules['inicioDomingo'] = 'required|date_format:H:i';
                    $rules['fimDomingo'] = 'required|date_format:H:i|after:inicioDomingo';
                } else if ($this->dayWeek[$i] == 'segunda-feira') {
                    $rules['inicioSegunda'] = 'required|date_format:H:i';
                    $rules['fimSegunda'] = 'required|date_format:H:i|after:inicioSegunda';
                } else if ($this->dayWeek[$i] == 'terca-feira') {
                    $rules['inicioTerca'] = 'required|date_format:H:i';
                    $rules['fimTerca'] = 'required|date_format:H:i|after:inicioTerca';
                } else if ($this->dayWeek[$i] == 'quarta-feira') {
                    $rules['inicioQuarta'] = 'required|date_format:H:i';
                    $rules['fimQuarta'] = 'required|date_format:H:i|after:inicioQuarta';
                } else if ($this->dayWeek[$i] == 'quinta-feira') {
                    $rules['inicioQuinta'] = 'required|date_format:H:i';
                    $rules['fimQuinta'] = 'required|date_format:H:i|after:inicioQuinta';
                } else if ($this->dayWeek[$i] == 'sexta-feira') {
                    $rules['inicioSexta'] = 'required|date_format:H:i';
                    $rules['fimSexta'] = 'required|date_format:H:i|after:inicioSexta';
                } else if ($this->dayWeek[$i] == 'sabado') {
                    $rules['inicioSabado'] = 'required|date_format:H:i';
                    $rules['fimSabado'] = 'required|date_format:H:i|after:inicioSabado';
                } else {
                    echo "ERRO";
                }
            }
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => "O nome do curso é obrigatório.",

            'description.required' => "A descrição do curso é obrigatória.",

            'vancancies.required' => "A quantidade de vagas é obrigatória.",
            'vancancies.numeric' => "A quantidade de vagas precisa ser um valor numérico.",
            'vacancies.min' => "O curso precisa de no mínimo uma (01) vaga.",

            'workload.required' => "A carga horária total do curso é obrigatória.",
            'workload.numeric' => "A carga horária Total do curso precisa ser uma valor numérico.",
            'workload.gt' => "A carga horária total do curso não pode ser igual ou menos que zero(0).",

            'startSubscription.required' => "O campo 'Ínicio das Incrições' é obrigatório.",
            'startSubscription.date' => "O campo 'Ínicio das Inscrições' precisa ser uma data.",

            'endSubscription.required' => "O campo 'Fim das Incrições' é obrigatório.",
            'endSubscription.date' => "O campo 'Fim das Inscrições' precisa ser uma data.",
            'endSubscription.after_or_equal' => "A data final das incrições não pode ser anterior a data de ínicio das inscrições",

            'startCourse.required' => "O campo 'Data de Ínicio do Curso' é obrigatório.",
            'startCourse.date' => "O campo 'Data de Ínicio do Curso' precisa ser uma data.",
            'startCourse.after_or_equal' => "A data de ínicio do curso não pode ser anterior a data de ínicio das inscrições",

            'endCourse.required' => "O campo 'Data Final do Curso' é obrigatório.",
            'endCourse.date' => "O campo 'Data Final do Curso' precisa ser uma data.",
            'endCourse.after_or_equal' => "A data final do curso não pode ser anterior a data de ínicio do curso",

            'dayWeek.required' => "A agenda de horários é obrigatória.",

            'inicioDomingo.required' => "O horário de ínicio de domingo é necessário se você marcou 'domingo' na agenda.",
            'inicioDomingo.date_format' => "O horário de ínicio de domingo precisa ser um valor de tempo.",
            'fimDomingo.required' => "O horário final de domingo é necessário se você marcou 'domingo' na agenda.",
            'fimDomingo.date_format' => "O horário final de domingo precisa ser um valor de tempo.",
            'fimDomingo.after' => "O horário de término da aula de domingo não pode ser menor que o horário de ínicio.",

            'inicioSegunda.required' => "O horário de ínicio de Segunda-feira é necessário se você marcou 'Segunda-Feira' na agenda.",
            'inicioSegunda.date_format' => "O horário de ínicio de Segunda-feira precisa ser um valor de tempo.",
            'fimSegunda.required' => "O horário final de Segunda-feira é necessário se você marcou 'Segunda-feira' na agenda.",
            'fimSegunda.date_format' => "O horário final de Segunda-feira precisa ser um valor de tempo.",
            'fimSegunda.after' => "O horário de término da aula de Segunda-feira não pode ser menor que o horário de ínicio.",

            'inicioTerca.required' => "O horário de ínicio de Terça-feira é necessário se você marcou 'Terca-Feira' na agenda.",
            'inicioTerca.date_format' => "O horário de ínicio de Terça-feira precisa ser um valor de tempo.",
            'fimTerca.required' => "O horário final de Terça-feira é necessário se você marcou 'Terca-feira' na agenda.",
            'fimTerca.date_format' => "O horário final de Terça-feira precisa ser um valor de tempo.",
            'fimTerca.after' => "O horário de término da aula de Terça-feira não pode ser menor que o horário de ínicio.",

            'inicioQuarta.required' => "O horário de ínicio de Quarta-feira é necessário se você marcou 'Quarta-Feira' na agenda.",
            'inicioQuarta.date_format' => "O horário de ínicio de Quarta-feira precisa ser um valor de tempo.",
            'fimQuarta.required' => "O horário final de Quarta-feira é necessário se você marcou 'Quarta-feira' na agenda.",
            'fimQuarta.date_format' => "O horário final de Quarta-feira precisa ser um valor de tempo.",
            'fimQuarta.after' => "O horário de término da aula de Quarta-feira não pode ser menor que o horário de ínicio.",

            'inicioQuinta.required' => "O horário de ínicio de Quinta-feira é necessário se você marcou 'Quinta-Feira' na agenda.",
            'inicioQuinta.date_format' => "O horário de ínicio de Quinta-feira precisa ser um valor de tempo.",
            'fimQuinta.required' => "O horário final de Quinta-feira é necessário se você marcou 'Quinta-feira' na agenda.",
            'fimQuinta.date_format' => "O horário final de Quinta-feira precisa ser um valor de tempo.",
            'fimQuinta.after' => "O horário de término da aula de Quinta-feira não pode ser menor que o horário de ínicio.",

            'inicioSexta.required' => "O horário de ínicio de Sexta-feira é necessário se você marcou 'Sexta-Feira' na agenda.",
            'inicioSexta.date_format' => "O horário de ínicio de Sexta-feira precisa ser um valor de tempo.",
            'fimSexta.required' => "O horário final de Sexta-feira é necessário se você marcou 'Sexta-feira' na agenda.",
            'fimSexta.date_format' => "O horário final de Sexta-feira precisa ser um valor de tempo.",
            'fimSexta.after' => "O horário de término da aula de Sexta-feira não pode ser menor que o horário de ínicio.",

            'inicioSabado.required' => "O horário de ínicio de Sábado é necessário se você marcou 'Sábado' na agenda.",
            'inicioSabado.date_format' => "O horário de ínicio de Sábado precisa ser um valor de tempo.",
            'fimSabado.required' => "O horário final de Sábado é necessário se você marcou 'Sábado' na agenda.",
            'fimSabado.date_format' => "O horário final de Sábado precisa ser um valor de tempo.",
            'fimSabado.after' => "O horário de término da aula de Sábado não pode ser menor que o horário de ínicio."

        ];
    }
}
