# Secure code by DevCybSec

This project was created to show you how to develop your web application securely.

> If you prefer to create this example from scratch follow the next instructions.

Install Symfony and NodeJS:

[Symfony Docs](https://symfony.com/doc/current/)

[NodeJS](https://nodejs.org/en)

Create the Symfony project:

```bash
symfony new secure-code --version="7.2.x" --webapp
```

Install the following dependencies and npm packages:

```bash
composer remove symfony/ux-turbo symfony/asset-mapper symfony/stimulus-bundle

composer require symfony/webpack-encore-bundle

npm install

composer require symfony/ux-turbo symfony/stimulus-bundle 

npm install 

composer require symfony/ux-react

npm install 

npm install tailwindcss @tailwindcss/postcss postcss postcss-loader

npm install -D @babel/preset-react typescript ts-loader@^9.0.0  webpack-notifier@^1.15.0 core-js
```

Uncomment and add the following lines in your __'webpack.config.js'__ file:

```webpack.config.js
    Encore
        .enablePostCssLoader()
        .enableStimulusBridge('./assets/controllers.json')
        .enableTypeScriptLoader()
        .enableReactPreset()
```

> Rename the root/assets/app.js to root/assets/app.ts

Change it in __web.config.js__
```webpack.config.js
.addEntry('app', './assets/app.js')
 to
.addEntry('app', './assets/app.ts')
```

Create the tsconfig.json file in your root directory

```json
{
    "compileOnSave": true,
    "compilerOptions": {
      "sourceMap": true,
      "moduleResolution": "node",
      "lib": ["dom", "es2015", "es2016"],
      "jsx": "react-jsx",
      "target": "es6"
    },
    "include": ["assets/**/*"]
}
```

Modify your ./assets/app.ts file with the following content:

```ts
import './bootstrap.js';
import { registerReactControllerComponents } from '@symfony/ux-react';
registerReactControllerComponents(require.context('./react/controllers', true, /\.(j|t)sx?$/));

import './styles/app.css';
```

This must be your ./assets/controller.json content

```json
{
    "controllers": {
        "@symfony/ux-react": {
            "react": {
                "enabled": true,
                "fetch": "eager"
            }
        },
        "@symfony/ux-turbo": {
            "turbo-core": {
                "enabled": true,
                "fetch": "eager"
            },
            "mercure-turbo-stream": {
                "enabled": false,
                "fetch": "eager"
            }
        }
    },
    "entrypoints": []
}
```

create the __postcss.config.mjs__ file in your root directory:

```postcss.config.mjs
export default {
    plugins: {
        "@tailwindcss/postcss": {},
    },
};
```

⚠️⚠️ Run npm run watch ⚠️⚠️

> If you get this error __Missing script: "dev"__ add the next lines to you package.json 

```json

{
  "scripts": {
    "dev": "encore dev",
    "watch": "encore dev --watch",
    "build": "encore production"
  },
  "devDependencies":"*Conserve his original content* ...devDependencies content to show where the user has to write the scripts content"
}
```



> If you get the following error, you have to install @symfony/webpack-encore manually

`'encore' is not recognized as an internal or external command`

```bash
npm install --save-dev  @symfony/webpack-encore
```

#### Start the whole project

```bash
npm run watch
```

> If you face the following error:

```bash
Module build failed: Module not found:
"./assets/bootstrap.js" contains a reference to the file "@symfony/stimulus-bundle".
```

`Install @symfony/stimulus-bridge manually running:`

```bash
npm install @symfony/stimulus-bridge
```

And change the boostrap.js import content from:

`import { startStimulusApp } from '@symfony/stimulus-bundle';`

to

`import { startStimulusApp } from '@symfony/stimulus-bridge';`


```bash
symfony server:start
```

