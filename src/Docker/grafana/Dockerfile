FROM grafana/grafana

# 控制面板配置文件下载地址：https://grafana.com/grafana/dashboards/10242-node-exporter-full/


# 启动
# docker run --name grafana \
#     --network default \
#     -v /www/study/src/Docker/grafana:/data/listener \
#     -p 9102:3000 \
#     grafana

# 工作目录/当前目录
WORKDIR /data/grafana

# update
RUN set -ex \
    && echo -e "\033[42;37m 监控模块-Grafana 已安装完成 :).\033[0m\n"

EXPOSE 3000
