import requests
import json

# for Melbourne  
BOM_JSON_URL = "http://www.bom.gov.au/fwo/IDV60901/IDV60901.95936.json"

# bypassing error 403
headers = {
    "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"
}

# fetch data
response = requests.get(BOM_JSON_URL, headers=headers)
data = response.json()

# extract latest observation
observations = data['observations']['data']
latest_obs = observations[0]  # most recent data

# extract weather details
temp = latest_obs['air_temp']
apparent_temp = latest_obs['apparent_t']
wind_dir = latest_obs['wind_dir']
wind_speed = latest_obs['wind_spd_kmh']
humidity = latest_obs['rel_hum']
weather_time = latest_obs['local_date_time']

# extract rainfall percentage (if available)
rainfall = latest_obs.get('precip_rate', 0)

print(temp)
#output facts
# print(f'Weather at Melbourne:')
# print(f"time {weather_time}:")
# print(f"temp: {temp} °C (Feels like {apparent_temp} °C)")
# print(f"wind: {wind_dir} at {wind_speed} km/h")
# print(f"humidity: {humidity}%")

# display rain if it's greater than 0%
if rainfall > 0:
    print(f"rain: {rainfall}% chance of rain")
