# PHP-React-Dist

Script PHP que permite desplegar una distribución React en cualquier Hosting con Apache

## Implementación en tiempo de ejecución
* Incluir el archivo **index.php** en la raiz del proyecto.
* Deployar en un servidor/Hosting/Cloud con Apache

## Implementación en tiempo de compilación
* Renombrar el archivo **index.php** a **run** (sin extencón).
* Modificar el FLAG **USE_PRE_BUILD** a **true**
* Modificar el script **build** del package.json
``` 
"scripts": {
    "dev": "vite",
    "build": "vite build && php run",
    "lint": "eslint . --ext js,jsx --report-unused-disable-directives --max-warnings 0",
    "preview": "vite preview"
  },
```

## Requisitos
* Para uso local se debe tener instalado PHP.
* Para deploy basta con que el hosting tenga PHP.
## Demo

https://testreactbuilderphp.000webhostapp.com/
## Author

- [@JorgeEmmilianoM](https://github.com/jorgeemilianom)

