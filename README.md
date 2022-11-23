#  PHP & RabbitMQ

A real world example of working with RabbitMQ in PHP. 

Project structure:

```
<project_root>
    |_ web (simple web application)
    |_ worker (worker implementation with RabbitMQ)
    |_ cli (the application command line interface)
    |_ docs (the project document which explain application architect and workflow)
    |_ testing (implement automated api testing and worker testing)
```

## TODO

Devops

- [ ] Setup develop environment with vagrant
- [ ] Install RabbitMQ, PHP 8.1, Composer in vagrant
- [ ] Setup CI/CD with GitHub Actions

Feature

Worker

- [ ] Email worker
- [ ] PDF generator worker
- [ ] ...

Web

- [ ] User register page
- [ ] Invoice request page
- ...


## Reference

- RabbitMQ Tutorials: https://www.rabbitmq.com/getstarted.html
- Vagrant Starter Kit: https://github.com/quan-vu/vagrant-starter-kit
