FROM mysql:8.0.29-debian

# 設定ファイルの上書き
COPY /docker/db/my.cnf /etc/mysql/conf.d
RUN chmod 644 /etc/mysql/conf.d

RUN apt-get update && apt-get install -y locales \
    && echo "ja_JP.UTF-8 UTF-8" > /etc/locale.gen \
    && locale-gen ja_JP.UTF-8 \
    && update-locale LANG=ja_JP.UTF-8

ENV LANG ja_JP.UTF-8

CMD ["mysqld"]