ARG PHP_VERSION=8.0

FROM hyperf/hyperf:${PHP_VERSION}-alpine-v3.12-swoole

# 要想在 FROM 之后使用 ARG 构建参数，必须再次指定
ARG PHP_VERSION=8.0

# 工作目录/当前目录
WORKDIR /data/www

# update
RUN set -ex \
    && apk update \
    # for swoole extension libaio linux-headers
    && apk add --no-cache php80-mongodb \
    && apk del --purge *-dev \
    && rm -rf /var/cache/apk/* /tmp/* /usr/share/man /usr/share/php8 \
    # php info
    && php -v \
    && php -m \
    && php --ri swoole \
    && php --ri Zend\ OPcache \
    && composer \
    # ---------- clear works ----------
    && rm -rf /var/cache/apk/* /tmp/* /usr/share/man /usr/local/bin/php* \
    && echo -e "\033[42;37m Build Completed :).\033[0m\n"
