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

    protected $status = 0;

    protected $error = '请求成功';



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


    public function msg(string $msg)
    {
        $this->error = $msg;

        return $this;
    }


    public function ok()
    {

        $data = [];
        $data ['status_code']   = $this->status;
        $data ['error']         = $this->error;
        $data ['data']          = $this->json;

        return response()->json($data);
    }
}