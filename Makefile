.PHONY: run
.ONESHELL:
run:
	npx webpack --watch&
	pid=$$!
	php -S localhost:8080&
	wait $$pid $$!

.PHONY: install
install:
	npm install
	composer install
