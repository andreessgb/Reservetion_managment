import redis
import time
import httpx
import json

r = redis.Redis(host="redis_server", port=6379, decode_responses=True)

while True:
    if r.exists("request"):
        laravelRequest = json.loads(r.get("request"))
        steam_id = laravelRequest["data"]["steam_id"]

        response = httpx.get(f"https://store.steampowered.com/api/appdetails?appids={steam_id}")
        data = response.json()
        
        r.set("response", json.dumps(data))  # Envía la respuesta
        r.delete("request")  # Borra la solicitud después de procesarla
        
    time.sleep(1)
