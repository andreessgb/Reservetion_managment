import json
import httpx
import redis


def getSteamGame():
    app_id = 1174180
    results = {}
    
    url = f"https://store.steampowered.com/api/appdetails?appids={app_id}"
    response = httpx.get(url)
    results[app_id] = response.json()

    