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
  function deleteMember($id){
  }
  # メンバーをファイルに編集
  # 引数:
  # $id: メンバーID
  # $attr: 変更する属性 ('real_name', 'handle_name', 'image_url'から選択)
  # $val: 変更後の値
  function modifyMember($id, $attr, $val){
  }
}
?>
