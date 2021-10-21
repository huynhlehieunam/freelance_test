<?php
include_once "RewardInterface.php";

class Main
{
    /**
     * @var \Collection\Staff
     */
    private $staff;
    /**
     * @var \Collection\ExamResult
     */
    private $examResult;

    public function __construct(\Collection\Staff $staff, \Collection\ExamResult $examResult)
    {
        $this->staff = $staff;
        $this->examResult = $examResult;
    }
    public function showOutStandingStaffs(){
        $this->staff->loadAll();
        foreach ($this->staff->getItems() as $item){
            $examResult = new $this->examResult(new DbConnection());
            $examResult->loadResultByStaffId($item->id);
            $totalScore = $this->sumScore($examResult->getItems());
            $this->showResult($item,$totalScore);
        }
    }

    private function sumScore(array $getItems)
    {
        $totalScore = 0;
        foreach ($getItems as $item){
            $totalScore+=$item->score;
        }
        return $totalScore;
    }

    private function showResult(\Model\StringifyFormat $item,$totalScore)
    {
        if ($totalScore > 150){
            echo "\nThong tin nhan vien: ".$item->toString();
            echo "\nMuc thuong: ".RewardInterface::REWARD_LEVEL_3;
            return;
        }
        if ($totalScore > 120){
            echo "\nThong tin nhan vien: ".$item->toString();
            echo "\nMuc thuong: ".RewardInterface::REWARD_LEVEL_2;
            return;
        }
        if ($totalScore > 100){
            echo "\nThong tin nhan vien: ".$item->toString();
            echo "\nMuc thuong: ".RewardInterface::REWARD_LEVEL_1;
        }
    }
}