start:
	docker-compose up -d

stop:
	docker-compose down

clean:
	docker-compose down -v

composer:
	composer dumpautoload

## RabbitMQ
demo-simple-send:
	php src/demo/simple/send.php

demo-simple-receive:
	php src/demo/simple/receive.php

demo-worker-publish:
	php src/demo/workers/publish_new_task.php

demo-worker:
	php src/demo/workers/worker_task_queue.php