# Usar la imagen oficial de PHP con FPM y extensiones necesarias
FROM php:8.1-fpm

# Instalar dependencias del sistema y herramientas necesarias
RUN apt-get update && apt-get install -y \
    curl \
    gnupg \
    lsb-release \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    && apt-get install -y --no-install-recommends \
    libvpx-dev \
    libx11-dev \
    libxext-dev \
    libxrender-dev \
    && apt-get clean

# Instalar Node.js 18.x (sin problemas con npm)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get update \
    && apt-get install -y nodejs \
    && apt-get clean

# Verificar la versión de npm y nodejs para asegurarse de que todo esté bien instalado
RUN node -v
RUN npm -v

# Si necesitas una versión específica de npm (por ejemplo npm@9)
RUN npm install -g npm@9

# Instalar las extensiones de PHP necesarias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establecer el directorio de trabajo en /var/www
WORKDIR /var/www

# Copiar los archivos de tu proyecto Laravel al contenedor
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-interaction --optimize-autoloader

# Copiar archivo de configuración Nginx (si es necesario)
#COPY nginx/default.conf /etc/nginx/sites-available/default

# Exponer el puerto 8000 (o el puerto que Laravel esté utilizando)
EXPOSE 8000

# Comando para iniciar el servidor de Laravel
CMD ["php-fpm"]
