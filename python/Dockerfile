# Usar imagen oficial de Python
FROM python:3.9

# Establecer directorio de trabajo en /python
WORKDIR /python

# Instalar Redis-py
RUN pip install redis
RUN pip install httpx
# Copiar el archivo worker.py
COPY ./python/worker.py /app/

# Definir el comando que ejecutará el worker
CMD ["python", "worker.py"]
