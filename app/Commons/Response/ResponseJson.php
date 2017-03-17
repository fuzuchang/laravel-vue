<?php
namespace App\Commons\Response;
/**
 * Created by PhpStorm.
 * User: Felix
 * Email: felix@1201.us
 * Date: 2017/3/17
 * Time: 15:37
 */
trait ResponseJson
{
    protected $json = [];

    protected $status = '200';

    public function json(array $data)
    {
        $this->json = $data;
        return $this;
    }

    public function status(int $status)
    {
        $this->status = $status;

        return $this;
    }

    public function ok()
    {
        return response()->json($this->json,$this->status);
    }
}