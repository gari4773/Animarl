<?php

class mdl_customer extends CI_Model
{
     //ANIMARLのデータベースを呼び出し
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //データの登録
   //登録するデータを第一引数で持つ
    public function test($c_test)
    {
        var_dump($c_test);
        //$c_testは連想配列、カラム名をkeyとして格納し
        //1引数でテーブル名、2で連想配列として受け渡す
        if($this->db->insert('customer', $c_test)) {
            return true;
        }else{
            return false;
        }
    }
    /**
     * get_customer_table
     * custmoerテーブルからデータを配列で取得
     * @return $query->result();
     */
}