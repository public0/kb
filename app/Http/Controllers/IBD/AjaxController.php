<?php

namespace App\Http\Controllers\IBD;

use App\Domain\Config\ConfigRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getParamsByType(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $typeParams = $config->getParametersByType($request->id);

        return response()->json([
            'typeParams' => $typeParams,
        ]);
    }

    public function getCalculations(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $typeParams = $config->GetCalculations();

        return response()->json([
            'typeParams' => $typeParams,
        ]);
    }

    public function getCalculationByType(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $typeParams = $config->GetCalculationsByType($request->id);

        return response()->json([
            'typeParams' => $typeParams,
        ]);
    }

    public function getCalculationInputTypes(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $typeParams = $config->GetCalculationInputTypes($request->id);

        return response()->json([
            'typeParams' => $typeParams,
        ]);
    }

    public function getDistinctCalcTypes(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $typeParams = $config->getDistinctCalcTypes();

        return response()->json([
            'typeParams' => $typeParams,
        ]);
    }


    public function getParams(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $typeParams = $config->getParams();

        return response()->json([
            'typeParams' => $typeParams,
        ]);
    }


    public function getCalculationCustomParams(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $typeParams = $config->GetCalculationCustomParams($request->id);

        return response()->json([
            'typeParams' => $typeParams,
        ]);
    }

    public function getTypesForSelect(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $types = $config->searchTypes($request->get('q'));
        $selectTypes = [];
        foreach ($types as $type) {
            $placeholder = new \stdClass();
            $placeholder->value = $type->Id;
            $placeholder->text = '('.$type->Id.')'.$type->Name;
            $selectTypes[] = $placeholder;
        }

        return response()->json($selectTypes);
    }

    public function getCalculationsForSelect(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $calculations = $config->searchCalculations($request->get('q'));
        $selectCalculations = [];
        foreach ($calculations as $calculation) {
            $placeholder = new \stdClass();
            $placeholder->value = $calculation->Id;
            $placeholder->text = '('.$calculation->Id.')'.$calculation->Name;
            $selectCalculations[] = $placeholder;
        }

        return response()->json($selectCalculations);
    }

    public function getTypes(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $typeParams = $config->getTypes();

        return response()->json([
            'typeParams' => $typeParams,
        ]);
    }

    public function addCalculation(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        dd($request);

        return response()->json([
            'typeParams' => $typeParams,
        ]);
    }

    public function updateCalculation(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        dd($request);

        return response()->json([
            'typeParams' => $typeParams,
        ]);
    }

    public function addCalculationInput(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $rules = [
            'calculation' => 'required',
            'type' => 'required|Integer',
            'alias' => 'required|String',
        ];

        $messages = [
            'required' => 'The :attribute field is required!'
        ];
        $request->validate($rules, $messages);

        $result = $config->addCalculationInputType($request->all());
        return response()->json([
            'response' => $result,
        ]);
    }

    public function addCalculationParam(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $rules = [
            'calculation' => 'required',
            'typeId' => 'required',
            'type' => 'required ',
            'param' => 'required',
        ];

        $messages = [
            'required' => 'The :attribute field is required!'
        ];
        $request->validate($rules, $messages);
        $result = $config->addCalculationCustomParam($request->all());
        return response()->json([
            'response' => $result,
        ]);
    }

    public function updateCalculationParam(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $rules = [
            'calculation' => 'required',
            'typeId' => 'required',
            'param' => 'required',
            'type' => 'required',
            'expression' => 'required',
        ];

        $messages = [
            'required' => 'The :attribute field is required!'
        ];


        $request->validate($rules, $messages);
        $config->updateCalculationParam($request->id, $request->all());

        return response()->json([
            'result' => true,
        ]);
    }


    public function updateCalculationInput(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $rules = [
            'calculation' => 'required',
            'type' => 'required|Integer',
            'alias' => 'required'
        ];

        $messages = [
            'required' => 'The :attribute field is required!'
        ];


        $request->validate($rules, $messages);
        $config->updateCalculationInputType($request->id, $request->all());

        return response()->json([
            'result' => true,
        ]);
    }

    public function updateTrigger(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $rules = [
            'name' => 'required',
            'status' => 'required',
        ];

        $messages = [
            'required' => 'The :attribute field is required!'
        ];


        $request->validate($rules, $messages);
        $config->updateTrigger($request->id, $request->all());

        return response()->json([
            'result' => true,
        ]);
    }

    public function addTrigger(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $rules = [
            'name' => 'required',
            'status' => 'required',
            'type' => 'required',
            'calculation' => 'required',
        ];

        $messages = [
            'required' => 'The :attribute field is required!'
        ];

        $request->validate($rules, $messages);

        $response = $config->addTrigger($request->all());

        return response()->json([
            'result' => $response,
        ]);
    }

    public function addTriggerParam(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $rules = [
            'triggerId' => 'required',
            'typeId' => 'required',
            'parameterId' => 'required',
            'typesqlexpression' => 'required',
            'sqlexpression' => 'required',
            'outputparameterId' => 'required',
        ];

        $messages = [
            'required' => 'The :attribute field is required!'
        ];

        $request->validate($rules, $messages);

        $response = $config->addTriggerParam($request->all());

        return response()->json([
            'result' => $response,
        ]);
    }

    public function updateTriggerParam(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $rules = [
            'triggerId' => 'required',
            'typesqlexpression' => 'required',
            'sqlexpression' => 'required',
        ];

        $messages = [
            'required' => 'The :attribute field is required!'
        ];
        $request->validate($rules, $messages);
        $config->updateTriggerParam($request->id, $request->all());

        return response()->json([
            'result' => true,
        ]);
    }

    public function getTriggerParamsByTrigger(
        Request $request,
        ConfigRepositoryInterface $config
    ) {
        $params = $config->getTriggerParametersByTrigger($request->id);

        return response()->json([
            'typeParams' => $params,
        ]);
    }

}
