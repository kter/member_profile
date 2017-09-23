<?php

require_once "spyc-0.6.1/Spyc.php";

class YamlIO {
  public $data;

  # ファイルをオープン
  # 引数:
  # $filename: 使用するファイル
  function initialize($filename = "memberinfo.yml"){
    $this->data = Spyc::YAMLLoad($filename);
  }

  # メンバーをファイルに追加
  # 引数:
  # $real_name: 本名
  # $handle_name: ハンドル(Slack)ネーム
  # $image_url: 顔写真のURL
  # 戻り値:
  # $id: メンバーID
  function addMember($real_name, $handle_name, $image_url){
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
