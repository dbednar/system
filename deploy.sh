git pull origin "$(git branch | grep -E '^\* ' | sed 's/^[^*]*\* //g')"
rm -rf vendor/lukaszmordawski
ant deploy