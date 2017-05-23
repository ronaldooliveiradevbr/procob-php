# procob-php
PHP SDK para a [API REST](https://api.procob.com/) da Procob S.A.


## Exemplo de uso

```php
$procob = new Procob\Procob($apiKey);
$response = $procob->send('GET', 'teste');

var_dump($response);
```


### A chave de acesso pode ser:

#### Token criado a partir do usuário e senha

```php
$apiKey = base64_encode('sandbox@procob.com:TesteApi');
```


#### ou um array no formato:

```php
$credentials = array('username', 'password');
```
