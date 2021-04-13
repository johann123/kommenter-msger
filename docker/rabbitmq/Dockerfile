FROM rabbitmq:3-management-alpine
MAINTAINER Vasbányai János <vasbanyai.j@gmail.com>

HEALTHCHECK --interval=10s --timeout=3s --retries=10 \
    CMD rabbitmq-diagnostics -q status
