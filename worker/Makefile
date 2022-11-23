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
	php demo/simple/send.php

demo-simple-receive:
	php demo/simple/receive.php

demo-worker-publish:
	php demo/workers/publish_new_task.php

demo-worker:
	php demo/workers/worker_task_queue.php