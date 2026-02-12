.PHONY: lint tree

lint:
	@find src -name '*.php' -print0 | xargs -0 -n1 php -l

tree:
	@find . -maxdepth 4 -type f | sort
