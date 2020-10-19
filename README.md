# quelcode-team3

## データベース設計書

- https://docs.google.com/spreadsheets/d/1iS_xmn1OPb5RTcZd8bSaPfaV3HbR5Z9JKJ0sbBQGWU4/edit?usp=sharing

## 基本設計書

- https://docs.google.com/presentation/d/1OlSldFi90NO4Dgj5oVf8I0hpwKZUeE_MxHd-8r4FFro/edit#slide=id.p

## JIRA

- https://quelcode-teamdev.atlassian.net/secure/BrowseProjects.jspa

## チームのルール

1. チームの朝会は、9時からのQUELCODEの朝会が終わり次第discordの会議室Aで行う。

1. レビュー依頼を出す際は、slack上にてレビュワーにメンションを飛ばす。

1. developブランチの管理

    1. 各自merge後にdevelopのチェックをする → issueを立てる
  
    1. 振り返り機能チェック会議を入れる → 月1400

1. デイリースクラムの内容

    1. 立ってるissueの確認、振り分け

    1. タスクの進捗報告（もう少し深く説明するようにする）他、周辺事情の説明

1. PRのレビュー基準の作成

    1. スプリントプランニングの際に、機能要件を細かく洗い出してチェックリストを作る。

    1. 意図がわかるソースコードになっているかについてもレビューを行う

## セットアップ手順

1. php コンテナのユーザ ID をホスト側と合わせるためのファイル .env を作成する

   1. どこでもよいのでコマンドラインで下記のコマンドを実行する

      ```
      id -u
      ```

   1. docker-compose.yml があるディレクトリで、下記のコマンドの 1000 の値を id -u で調べた値に書き換えて実行する

      ```
      # 1000 の値を id -u で調べた値に書き換えて実行する
      echo DOCKER_UID=1000 > .env
      ```

   - docker-compose.yml があるディレクトリに .env ファイルが作成されたら成功

     ```
     # .env は隠しファイルなので ls -a で視認できる
     ls -a
     .  ..  .env  .git  .gitignore  README.md  docker  docker-compose.yml  html
     ```

   - Linux ではユーザ ID が異なるとコンテナで作成したファイルをホスト側で編集できなくなる
   - Mac はユーザ権限が独特なためユーザ ID を一致させる必要はないとの説もある
   - Windows の人は WSL (Windows Subsystem for Linux) を使おう

1. docker-compose.yml があるディレクトリで下記のコマンドを実行する。初回起動には時間がかかる

   ```
   docker-compose up -d
   ```

   - 下記のようなメッセージが出たら成功

     ```
     Creating network "quelcode-cakephp_default" with the default driver
     Creating quelcode-cakephp_phpmyadmin_1 ... done
     Creating quelcode-cakephp_nginx_1      ... done
     Creating quelcode-cakephp_mysql_1      ... done
     Creating quelcode-cakephp_php_1        ... done
     ```

1. 起動中の php コンテナの bash を実行する

   ```
   docker-compose exec php bash
   ```

   - 下記のようなプロンプトに切り替われば成功

     ```
     docker@df8275e6f1f9:/var/www/html$
     ```

   - VSCode の Docker 拡張でも同じことができる。
     左側の Docker アイコンをクリック → "CONTAINERS"の php コンテナを右クリック → "Attach Shell"で php コンテナの bash が開きます。

1. php コンテナの bash で cakephp を install する

   1. php コンテナの bash で /var/www/html/movieReserveApp に移動する

   1. composer install を実行する

      ```
      docker@e6e656dc2f0d:/var/www/html/movieReserveApp$ composer install
      ```

      - こちらも時間がかかる。質問プロンプトが出たら Y と回答する

        ```
        Set Folder Permissions ? (Default to Y) [Y,n]? Y
        ```

1. config/app.php を編集する

   ```
   'App' => [

      ~~~~~

      'defaultTimezone' = env('APP_DEFAULT_TIMEZONE', 'Asia/Tokyo'),

      ~~~~~

      ]

   ```

   ```
   'Datasources' => [
      'default => [

         ~~~~~~

         'host' => 'mysql',

         ~~~~~~

         'username' => 'docker_db_user',
         'password' => 'docker_db_user_pass',
         'database' => 'docker_db',

         ~~~~~~

         'timezone' => 'Asia/Tokyo',

         ~~~~~~

      ]
   ]

   ```

1. cakephp アプリをブラウザで表示する

   - http://localhost:10080 にアクセスして cakephp の赤いページが表示されたらセットアップ成功
