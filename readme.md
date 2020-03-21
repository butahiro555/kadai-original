<h1>Template&nbsp;Creator</h1>
This is an application for create and edit templates.
<br>
By using this application, you can manage fixed templates very easily.
<br>
<br>
これは定型文を作成、編集するためのアプリケーションです。
<br>
このアプリケーションを使うことで、とても簡単に定型文を管理することが出来ます。

<h3>Description</h3>
We often encounter the opportunity to create email-like texts on a regular basis, both at work and at private.
<br>
In such a case, we created this application in order to reduce the trouble of inputting a sentence using a similar expression and to avoid mistakenly sending a sentence in the process of being edited on the email editing screen.
<br>
In addition, by making the text field easy to understand and the specification of few page transitions, the service is easy to use even for first-time users.
<br>
<br>
私たちは日頃から仕事やプライベートで、メールのような文章を作成する機会によく遭遇します。
<br>
そんなとき、同じような表現を用いた文章を入力する手間や、メールの編集画面で作成途中の文章を誤送信してしまうミスを抑えることを想定して、このアプリケーションを作成しました。
<br>
また、文章構成が分かりやすい入力欄や、少ないページ遷移の仕様にすることで、初めて使うユーザーでも使いやすいようなサービスになっています。

<h3>Demo</h3>
<a href="https://gyazo.com/b9be552471658a84ada8bc3d3280083b"><img src="https://i.gyazo.com/b9be552471658a84ada8bc3d3280083b.gif" alt="Image from Gyazo" width="968"/></a>

<h3>Requirement</h3>
- PHP 7.2.24
- Laravel framework 5.5
- AWS Cloud9

<h3>Installation</h3>
Execute the following command on the Cloud9-terminal to download the file.
<br>
<br>
以下のコマンドをCloud9のターミナル上で実行して、ファイルをダウンロードしてください。
<br>
<br>
$ git clone https://github.com/tomo-t1230/kadai-original.git

<h3>Usage</h3>
Execute the following command on the Cloud9-terminal.
<br>
<br>
以下のコマンドをCloud9のターミナル上で実行してください。
<br>
<br>
$ cd Create_template
<br>
$ sudo service mysqld start
<br>
$ php artisan serve --host=$IP --port=$PORT
<br>
<br>
Finally, open the application by clicking "Preview Running Application" in the "Preview button" at the top of the menu bar.
<br>
<br>
最後に、メニューバー上部にある「Previewボタン」の「Preview Running Application」をクリックして、アプリケーションを開いてください。
<br>
<a href="https://gyazo.com/6e30cae6aae1d6a536835d0b1c3bfac8"><img src="https://i.gyazo.com/6e30cae6aae1d6a536835d0b1c3bfac8.png" alt="Image from Gyazo" width="288"/></a>
<h3>Note</h3>
I don't test environments under Linux and Mac.
<br>
<br>
Linux、Macの環境下では、テストを実施していません。

<h3>Heroku</h3>
This application is deployed on Heroku.
<br>
<br>
Herokuに本アプリケーションをデプロイしています。
<br>
<br>
http://tomo-original-service.herokuapp.com/

<h3>Licence</h3>
"Laravel framework" is open source software licensed under <a href="https://en.wikipedia.org/wiki/MIT_License">the MIT license</a>.
<br>
<br>
「Laravel framework」は、<a href="https://en.wikipedia.org/wiki/MIT_License">MITライセンス</a>の下にライセンスされているオープンソースのソフトウェアです。