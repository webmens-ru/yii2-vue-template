<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2Vue Basic Project Template</h1>
    <br>
</p>

Yii 2/Vue Basic Project Template represents example of simple application that runs vue app inside yii2.


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      src/                contains entry script and Vue code
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vagrant/            contains provision script and other machine configuration
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources


INSTALLATION
------------

### Set it up via Vagrant

Navigate to the root app directory and run: 
~~~
vagrant up
~~~

Please notice provision.sh script inside vagrant folder. Everything that is needed for appropriate running simple Vue app inside existing Yii2 app is configured here. No additional steps needed, just visit url above.

~~~
http://yii2-vue-basic.local/
~~~
