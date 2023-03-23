# php-sftp-docker

## composition
- Docker
  - 複数docker-compose間をnetwork(sftp01に定義)で連携
- app01
  - centOS7
  - PHP7.2
  - ssh2
  - Xdebug
- sftp01
  - debian
  - atmoz/sftp

## install and Usage
1. コンテナ起動(sftp, ネットワーク)
```shell
cd php-sftp-docker/server
docker-compose up -d
```

2. コンテナ起動(PHPクライアント)
```shell
cd php-sftp-docker/client
docker-compose build
docker-compose up -d
```

3. コンテナ,ネットワーク確認
```shell
docker ps
docker network inspect sftp-network
```

4. SFTPファイル送信
```shell
cd php-sftp-docker/client
docker-compose exec app01 bash
php ssh2.php
```

5. ファイル受信確認
```shell
cd php-sftp-docker/server
docker-compose exec sftp01 bash
cd /home/ftpuser/sftp_home/
ls -l
```

## memo
### PhpStormでのXdebug設定
- 名前をPHP_IDE_CONFIGと合わせる。
- パスマッピングの指定は、「ファイル/ディレクトリ」にソースが存在するローカル絶対パス、「サーバー上の絶対パス」にマウントしたソースが存在するdocker上の絶対パス。
![phpstormXdebug](https://user-images.githubusercontent.com/102776020/227116628-2812309c-d378-4afb-94f0-9b68b010e07e.png)
