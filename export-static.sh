#!/bin/bash

# Static HTML export script for Vercel
OUTPUT="static-export"
BASE_URL="http://127.0.0.1:8000"

mkdir -p $OUTPUT/projects
mkdir -p $OUTPUT/services
mkdir -p $OUTPUT/design
mkdir -p $OUTPUT/automation
mkdir -p $OUTPUT/arvr
mkdir -p $OUTPUT/vacancies
mkdir -p $OUTPUT/news
mkdir -p $OUTPUT/contacts

echo "Exporting pages..."

curl -s "$BASE_URL/" > $OUTPUT/index.html
curl -s "$BASE_URL/projects" > $OUTPUT/projects/index.html
curl -s "$BASE_URL/services" > $OUTPUT/services/index.html
curl -s "$BASE_URL/design" > $OUTPUT/design/index.html
curl -s "$BASE_URL/automation" > $OUTPUT/automation/index.html
curl -s "$BASE_URL/arvr" > $OUTPUT/arvr/index.html
curl -s "$BASE_URL/vacancies" > $OUTPUT/vacancies/index.html
curl -s "$BASE_URL/news" > $OUTPUT/news/index.html
curl -s "$BASE_URL/contacts" > $OUTPUT/contacts/index.html

echo "Copying assets..."
cp -r public/build $OUTPUT/build
cp -r public/public $OUTPUT/public
cp public/global.css $OUTPUT/global.css 2>/dev/null || true
cp public/index.css $OUTPUT/index.css 2>/dev/null || true
cp public/index.js $OUTPUT/index.js 2>/dev/null || true
cp public/favicon.ico $OUTPUT/favicon.ico 2>/dev/null || true

echo "Done! Static files in: $OUTPUT/"
