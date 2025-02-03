import redis
import time

redis_client = redis.Redis(host='redis', port=6379, decode_responses=True)

while True:
    redis_client.set('message', 'Hola desde Python')
    print("Mensaje enviado a Redis")
    time.sleep(5)
