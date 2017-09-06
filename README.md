# procob-php
PHP SDK para a [API REST](https://api.procob.com/) da Procob S.A.

[![Build Status](https://travis-ci.org/rfdeoliveira/procob-php.svg?branch=master)](https://travis-ci.org/rfdeoliveira/procob-php)


## Exemplo de uso

```php
$procob = new Procob\Procob($credentials);

$person = $procob->persons()->findByCpf($cpf);

var_dump($person);
```


### A chave de acesso pode ser:

#### Token criado a partir do usuário e senha

```php
$apiKey = base64_encode('username:password');
```


#### ou um array:

```php
$credentials = array('username', 'password');
```
