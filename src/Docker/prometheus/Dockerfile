FROM bitnami/prometheus

# 启动
# docker run --name prometheus \
#     --network default \
#     -v /www/study/src/Docker/prometheus:/data/listener \
#     -p 9101:9090 \
#     -v /www/study/src/Docker/prometheus/prometheus.yml:/opt/bitnami/prometheus/conf/prometheus.yml \
#     prometheus

# 工作目录/当前目录
WORKDIR /data/prometheus

# update
RUN set -ex \
    && echo -e "\033[42;37m 监控模块-普罗米修斯已安装完成 :).\033[0m\n"

EXPOSE 9090
