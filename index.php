<?php

require_once "spyc-0.6.1/Spyc.php";

class YamlIO {
  public $data;
  public $filename;

  # ファイルをオープン
  # 引数:
  # $filename: 使用するファイル
  function initialize($filename = "memberinfo.yml"){
    $this->filename = $filename;
    $this->data = Spyc::YAMLLoad($this->filename);
  }

  # メンバーをファイルに追加
  # 引数:
  # $real_name: 本名
  # $handle_name: ハンドル(Slack)ネーム
  # $image_url: 顔写真のURL
  # 戻り値:
  # $id: メンバーID
  function addMember($real_name, $handle_name, $image_url){
    $this->data[] = array(
      'id' => count($this->data) + 1,
      'real_name' => $real_name,
      'handle_name' => $handle_name,
      'image_url' => $image_url
    );
    file_put_contents($this->filename, Spyc::YAMLDump($this->data));
    return count($this->data);
  }
  # メンバーをファイルから削除
  # 引数:
  # $id: メンバーID
  function deleteMember($member_id){
    foreach($this->data as $key => $value){
      if($value['id'] == $member_id){
        array_splice($this->data, $key, 1);
        return true;
      }
    }
  }
  # メンバーをファイルに編集
  # 引数:
  # $id: メンバーID
  # $attr: 変更する属性 ('real_name', 'handle_name', 'image_url'から選択)
  # $val: 変更後の値
  function modifyMember($member_id, $attr, $val){
    foreach($this->data as $key => $value){
      if($value['id'] == $member_id){
        $this->data[$key][$attr]=$val;
      }
    }
  }
  # メンバー情報を取得
  # 引数:
  # $id: メンバーID
  function loadMember($member_id = null){
    if(is_null($member_id)) return $this->data;
    foreach($this->data as $key => $value){
      if($value['id'] == $member_id){
        return $this->data[$key];
      }
    }
    return false;
  }
}
?>
