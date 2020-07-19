# Base
FROM nginx:1.19-alpine AS base
COPY .docker/nginx/vhost.conf /etc/nginx/conf.d/default.conf

# Dev environment
FROM base AS dev
