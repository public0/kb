<?php

namespace App\Domain\Config;

interface ConfigRepositoryInterface {
    public function getTypes();
    public function searchTypes($query);
    public function searchCalculations($query);
    public function getParameters();
    public function getParametersByType(int $type);
    public function GetCalculations();
    public function getParams();
    public function getDistinctCalcTypes();
    public function GetCalculationsByType(int $type);
    public function GetCalculationInputTypes(int $calculation);
    public function GetCalculationCustomParams(int $calculation);
    public function addCalculationInputType($data);
    public function addCalculationCustomParam($data);
    public function updateCalculationInputType(int $calculation, $data);
    public function updateCalculationParam(int $calculation, $data);
    public function getTriggers();
    public function getTrigger($id);
    public function updateTrigger(int $trigger, $data);
    public function addTrigger($data);
    public function getTriggerParametersByTrigger(int $trigger);
    public function getTriggerParam($id);
    public function updateTriggerParam(int $triggerParam, $data);
    public function addTriggerParam($data);


}