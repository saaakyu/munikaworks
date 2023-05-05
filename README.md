# サイト仕様書
  
## 雛形の仕様について  
|使用雛形バージョン|
|:---|
|v1.1.6.1|
  
[仕様書を確認](https://paper.dropbox.com/doc/v1.0.0--AeGGWnWPUXvpI7iQZ3NhIYV4Ag-XyyEPDMlQg6KKELoexS3k "仕様書を確認")  
  
## 対象PHPバージョン＋OS＋ブラウザ
**【PHPバージョン】**php 5.3+  
**【OS】Windows** 7 / 8.1 / 10  **Mac**OS v10.14以上  
**【ブラウザ】**  
**Windows** Google Chrome 最新版・Microsoft Edge・Internet Explorer 11・Firefox 最新版  
**Mac** Safari 最新版・Google Chrome 最新版・Firefox 最新版  
**スマートフォン** iOS 13+・Android 6.0～8.1+ ※Google Chrome 最新版ブラウザのみ  
  
[留意事項](https://www.dropbox.com/home/%E5%85%A8%E7%A4%BE%E5%85%B1%E6%9C%89/%E7%95%99%E6%84%8F%E4%BA%8B%E9%A0%85 "留意事項")   
  
## 利用ツール・バージョンについて
|ツール名|バージョン|公式サイト|
|:---|:---|:---|
|php(XAMPP)|0.0.0|[xampp](https://www.apachefriends.org/jp/index.html "xampp")|  
|koala|0.0.0|[koala](http://koala-app.com/ "koala")|  
|gulp|0.0.0|[gulp](https://gulpjs.com/ "gulp")|  
|Node.js|0.0.0|[Node.js](https://nodejs.org/ja/ "Node.js")|  
  
  
## HTML / CSS / JSの表記について
以下のガードラインに沿って記述  
[コーディングガイドライン](https://paper.dropbox.com/doc/ver3.0--AeX4UBe5qBFNCDx0h6tghgiPAg-6GmOCFXbqsorRqqpJyWd9 "コーディングガイドライン")  
  

## jquryについて
jquery3.4.1を使用しています。  
[jquery](https://jquery.com/ "jquery")  
  

## example.com サイト仕様について
ここに各サイトの仕様を表記する。  
  

## その他メモ
**1.jquryのアニメーション機能などを使わない場合は、一番軽量なslim版を使用してください**
```
<!-- jquery-3.4.1 slim版　-->  
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
```
  

**2.jquery1.9.0で廃止された機能を使う場合は下記ソースを追加してください**
```
<script src="https://code.jquery.com/jquery-migrate-3.1.0.min.js" integrity="sha256-ycJeXbll9m7dHKeaPbXBkZH8BuP99SmPm/8q5O+SbBc=" crossorigin="anonymous"></script>
```
[jquery-migrateについて](http://bashalog.c-brains.jp/13/11/14-142300.php "jquery-migrateについて")  
  
  
**3.jqury2系がやむおえず必要な場合は、以下のソースからご使用ください**
```
<!-- jquery-2.2.4　-->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
```
  

**3.LOCATION_ROOT_DIR & LOCATION_FILE_DIR の階層について**  
読み込んでいるconfig.phpファイルがどこにあるかによってパスの設定が必要になります。  
※config.php に定義されていることが前提です  
```
//configが2階層にある場合
define('LOCATION_ROOT_DIR', __DIR__.'/../..'. DIRECTORY_SEPARATOR, true);
define('LOCATION_FILE_DIR', __DIR__.'/../../files/'.DIRECTORY_SEPARATOR, true);
// configが3階層にある場合
define('LOCATION_ROOT_DIR', __DIR__.'/../../..'. DIRECTORY_SEPARATOR, true);
define('LOCATION_FILE_DIR', __DIR__.'/../../../files/'.DIRECTORY_SEPARATOR, true);
```
