<?php

namespace App\Domain\Config;

use Illuminate\Support\Facades\DB;
use App\Exceptions\MSSQLException;

class EloquentConfigRepository implements ConfigRepositoryInterface {
    public function getCalculationTypes() {
        return DB::connection('sqlsrv2')->select(DB::raw('exec [ibd].[Config_GetCalculationType]'));
    }
    public function getTypes() {
        return DB::connection('sqlsrv2')->select(DB::raw('exec [ibd].[Config_GetTypes]'));
    }
    public function searchTypes($query) {
        return DB::connection('sqlsrv2')->select(DB::raw('SELECT * FROM ibd.Types WHERE Name LIKE \'%'.$query.'%\''));
    }
    public function searchCalculations($query) {
        return DB::connection('sqlsrv2')->select(DB::raw('SELECT * FROM ibd.Calculations WHERE Name LIKE \'%'.$query.'%\''));
    }
    public function getParameters() {
        return DB::connection('sqlsrv2')->select(DB::raw('exec [ibd].[Config_GetParameters]'));
    }
    public function getParametersByType(int $type) {
        return DB::connection('sqlsrv2')->select(DB::raw('exec [ibd].[Config_GetParametersByType] '.$type));
    }
    public function getTriggerParametersByTrigger(int $trigger) {
        return DB::connection('sqlsrv2')->select(DB::raw('exec [ibd].[Config_GetTriggerCustomParamsByTrigger] '.$trigger));
    }
    public function GetCalculations() {
        return DB::connection('sqlsrv2')->select(DB::raw('exec [ibd].[Config_GetCalculations]'));
    }
    public function GetCalculationsByType(int $type) {
        return DB::connection('sqlsrv2')->select(DB::raw('exec [ibd].[Config_GetCalculationByTypeId] '.$type));
    }
    public function GetCalculationInputTypes(int $calculation) {
        return DB::connection('sqlsrv2')->select(DB::raw('exec [ibd].[Config_GetCalculationInputTypes] '.$calculation));
    }
    public function GetCalculationCustomParams(int $calculation) {
        return DB::connection('sqlsrv2')->select(DB::raw('exec [ibd].[Config_GetCalculationCustomParams] '.$calculation));
    }
    public function getInputTypeById($id) {
        return DB::connection('sqlsrv2')->select(DB::raw('SELECT * FROM ibd.CalculationInputTypes WHERE Id = '.$id));
    }
    public function getCustomParamsById($id) {
        return DB::connection('sqlsrv2')->select(
            DB::raw('SELECT ccp.Id as Id, 
            ccp.CalculationId as CalculationId, 
            ccp.TypeIdInput as TypeIdInput,
            t.Name as TypeNameInput,
            ccp.ParameterId as ParameterId,
            p.Name as ParameterName,
            ccp.CalculationCustomParamType as CalculationCustomParamType,
            ccp.SQLExpression as SQLExpression
            FROM ibd.CalculationCustomParams as ccp
            INNER JOIN ibd.Parameters as p ON ccp.ParameterId = p.Id
            INNER JOIN ibd.Types as t ON ccp.TypeIdInput = t.Id
            WHERE ccp.Id = '.$id)
        );
    }
    public function getParams() {
        return DB::connection('sqlsrv2')->select(DB::raw('SELECT * FROM ibd.Parameters'));
    }
    public function getDistinctCalcTypes() {
        return DB::connection('sqlsrv2')->select(DB::raw('SELECT DISTINCT CalculationCustomParamType FROM ibd.CalculationCustomParams'));
    }
    public function addCalculationInputType($data) {
        $params = sprintf('@Id=NULL,@CalculationId=%s,@TypeId=%s,@TypeAlias=%s,@UpdateValues=%s,@Description=%s',
            $data['calculation'],
            $data['type'],
            $data['alias'],
            ($data['updatevalues'])?$data['updatevalues']:'NULL',
            ($data['desc'])?$data['desc']:'NULL'
        );
        try {
            return DB::connection('sqlsrv2')->insert(DB::raw('exec [ibd].[Config_CalculationInputType_IU] '.$params));
        } catch(MSSQLException $e) {
            return ['error', $e->getMessage()];
        }
    }
    public function addCalculationCustomParam($data) {
        $params = sprintf('@Id=NULL,@CalculationId=%s,@TypeIdInput=%s,@ParameterId=%s,@CalculationCustomParamType=%s,@SQLExpression=\'%s\'',
            $data['calculation'],
            $data['typeId'],
            $data['param'],
            $data['type'],
            $data['expression'],
        );
        try {
            return DB::connection('sqlsrv2')->insert(DB::raw('exec [ibd].[Config_CalculationCustomParam_IU] '.$params));
        } catch(MSSQLException $e) {
            return ['error', $e->getMessage()];
        }
    }

    public function updateCalculationInputType(int $inputType, $data) {
        $params = sprintf('@Id=%s,@CalculationId=%s,@TypeId=%s,@TypeAlias=%s,@UpdateValues=%s,@Description=%s',
            $inputType,
            $data['calculation'],
            $data['type'],
            $data['alias'],
            ($data['updatevalues'])?$data['updatevalues']:'NULL',
            ($data['desc'])?$data['desc']:'NULL'
        );
        try {
            return DB::connection('sqlsrv2')->update(DB::raw('exec [ibd].[Config_CalculationInputType_IU] '.$params));
        } catch(MSSQLException $e) {
            return ['error', $e->getMessage()];
        }
    }

    public function updateCalculationParam(int $param, $data) {
        $params = sprintf('@Id=%s,@CalculationId=%s,@TypeIdInput=%s,@ParameterId=%s,@CalculationCustomParamType=%s,@SQLExpression=\'%s\'',
            $param,
            $data['calculation'],
            $data['typeId'],
            $data['param'],
            $data['type'],
            ($data['expression'])?$data['expression']:'NULL'
        );
        try {
            return DB::connection('sqlsrv2')->update(DB::raw('exec [ibd].[Config_CalculationCustomParam_IU] '.$params));
        } catch(MSSQLException $e) {
            return ['error', $e->getMessage()];
        }
    }

    public function deleteCalculationIt(int $id) {
        return DB::connection('sqlsrv2')->table('ibd.CalculationInputTypes')->where('Id', '=', $id)->delete();
    }

    public function deleteCalculationCp(int $id) {
        return DB::connection('sqlsrv2')->table('ibd.CalculationCustomParams')->where('Id', '=', $id)->delete();
    }

    public function getTriggers() {
        return DB::connection('sqlsrv2')->select(DB::raw('exec [ibd].[Config_GetTriggers]'));
    }

    public function getTrigger($id) {
        return DB::connection('sqlsrv2')->selectOne(DB::raw('SELECT * FROM ibd.Triggers WHERE Id='.$id));
    }
    public function getTriggerParam($id) {
        return DB::connection('sqlsrv2')->selectOne(DB::raw('SELECT * FROM ibd.TriggerCustomParams  WHERE Id='.$id));
    }


    public function updateTrigger(int $trigger, $data) {
        $trigger = $this->getTrigger($trigger);
        if($trigger) {
            $data['type']=$data['type']?$data['type']:$trigger->TriggeredType;
            $data['calculation']=$data['calculation']?$data['calculation']:$trigger->GeneratedCalculationId;
        }
        $params = sprintf('@Id=%s,@Name=\'%s\',@Description=\'%s\',@TriggeredType=%s,@GeneratedCalculationId=%s,@Activ=%s',
            $trigger->Id,
            $data['name'],
            $data['desc'],
            $data['type'],
            $data['calculation'],
            $data['status']
        );
        try {
            return DB::connection('sqlsrv2')->update(DB::raw('exec [ibd].[Config_Triggers_IU] '.$params));
        } catch(MSSQLException $e) {
            return ['error', $e->getMessage()];
        }
    }

    public function addTrigger($data) {
        $params = sprintf('@Id=NULL,@Name=\'%s\',@Description=\'%s\',@TriggeredType=%s,@GeneratedCalculationId=%s,@Activ=%s',
            $data['name'],
            $data['desc'],
            $data['type'],
            $data['calculation'],
            $data['status']
        );
        try {
            return DB::connection('sqlsrv2')->selectOne(DB::raw('exec [ibd].[Config_Triggers_IU] '.$params));
        } catch(MSSQLException $e) {
            return ['error', $e->getMessage()];
        }
    }

    public function updateTriggerParam(int $triggerParam, $data) {
        $param = $this->getTriggerParam($triggerParam);
        if($param) {
            $data['triggerId'] = $param->TriggerId;
            $data['typeId'] = $param->TypeId;
            $data['parameterId'] = $param->ParameterId;
            $data['typesqlexpression']=$data['typesqlexpression']?$data['typesqlexpression']:$param->TypeSQLExpression;
            $data['sqlexpression']=$data['sqlexpression']?$data['sqlexpression']:$param->SQLExpression;
            $data['outputparameterId'] = $param->OutputParameterId;

        }
        $params = sprintf('@Id=%s,@TriggerId=%s,@TypeId=%s,@ParameterId=%s,@TypeSQLExpression=\'%s\',@SQLExpression=\'%s\',@OutputParameterId=%s',
            $param->Id,
            $data['triggerId'],
            $data['typeId'],
            $data['parameterId'],
            $data['typesqlexpression'],
            $data['sqlexpression'],
            $data['outputparameterId']
        );
        try {
            return DB::connection('sqlsrv2')->update(DB::raw('exec [ibd].[Config_TriggerCustomParams_IU] '.$params));
        } catch(MSSQLException $e) {
            return ['error', $e->getMessage()];
        }
    }

    public function addTriggerParam($data) {
        $params = sprintf('@Id=NULL,@TriggerId=%s,@TypeId=%s,@ParameterId=%s,@TypeSQLExpression=\'%s\',@SQLExpression=\'%s\',@OutputParameterId=%s',
            $data['triggerId'],
            $data['typeId'],
            $data['parameterId'],
            $data['typesqlexpression'],
            $data['sqlexpression'],
            $data['outputparameterId']
        );
        try {
            return DB::connection('sqlsrv2')->selectOne(DB::raw('exec [ibd].[Config_TriggerCustomParams_IU] '.$params));
        } catch(MSSQLException $e) {
            return ['error', $e->getMessage()];
        }
    }

    public function addCalculation($data) {
        $params = sprintf('@Id=NULL,@Name="%s",@Description="%s",@OutputTypeId=%s,@CalculationType="%s",@Calculation="%s",@Activ=%s',
            $data['name'],
            $data['desc'],
            $data['outputType'],
            $data['type'],
            $data['calc'],
            $data['status']
        );
        try {
            return DB::connection('sqlsrv2')->selectOne(DB::raw('exec [ibd].[Config_Calculation_IU] '.$params));
        } catch(MSSQLException $e) {
            return ['error', $e->getMessage()];
        }
    }

    public function updateCalculation(int $id, $data) {
        $params = sprintf('@Id=%s,@Name="%s",@Description="%s",@OutputTypeId=%s,@CalculationType="%s",@Calculation="%s",@Activ=%s',
            $id,
            $data['name'],
            $data['desc'],
            $data['outputType'],
            $data['type'],
            $data['calc'],
            $data['status']
        );

        try {
            return DB::connection('sqlsrv2')->update(DB::raw('exec [ibd].[Config_Calculation_IU] '.$params));
        } catch(MSSQLException $e) {
            return ['error', $e->getMessage()];
        }

    }

}