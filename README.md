# Анализатор логов

Проект предоставляет команды для анализирования логов сервисов.

## Окружение

- PHP 8.0

## Развертывание проекта

Проект можно развернуть в локальном окружении:
```shell
php composer.phar install
```

Также можно собрать образ с готовым для проекта окружением:
```shell
make build
```

## Команды

Список команд проекта можно узнять выполнив команду

В локальном окружении:
```shell
php application.php
```

Через Docker образ:
```shell
make commands
```

### Анализирование логов

Команда потоково сканирует потоково логи, либо через stdin, либо в параметрах указываем путь к файлу, и возвращает временные интервалы, в которых сервис по заданным параметрам являлся недоступным, и процент доступности в процентах.

Пример запуска локально:

```shell
php application.php analyze:logs:unavailable:stream 90 45 ./resources/logs/access.test.log
```
или
```shell
cat ./resources/logs/access.test.log | php application.php analyze:logs:unavailable:stream 90 45
```

Пример запуска в Docker образе:
```shell
make run-analyze-example
```

> WIP
> 
> Для генерирования логов, локально можно выполнить комманду. В результате выполнения сформируется файл логов `./resources/logs/access.log` на 10m строк
> 
> ```shell
> php fixture.php
> ```

## Тесты

Запуск тестов локально:
```shell
./vendore/bin/phpuint --configure ./phpunit.xml --testdox
```

Запуск тестов в Docker образе:
```shell
make run-tests
```
