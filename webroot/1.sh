#!/bin/zsh

curl http://yuce2.com/api/gameInfo/5/100 > 11.json 
rm -rf 1.json 3.json
mv 11.json 1.json
cp 1.json 3.json
sleep 1

curl -d "gameId=5&yuceInfoId=1&suanfaId=1" http://28xiaomi.com/api/yuce/indexYuce > 12.json
rm -rf 2.json
mv 12.json 2.json
sleep 1

curl http://28xiaomi.com/api/getHaoMaYuce?gameId=5 > 14.json
rm -rf 4.json
mv 14.json 4.json
sleep 1

curl -d "gameId=5&yuceInfoId=3&suanfaId=1" http://28xiaomi.com/api/yuce/indexYuce > 15.json
rm -rf 5.json
mv 15.json 5.json
sleep 1

curl -d "gameId=5&yuceInfoId=2&suanfaId=1" http://28xiaomi.com/api/yuce/indexYuce > 16.json
rm -rf 6.json
mv 16.json 6.json
sleep 1

curl -d "gameId=5&yuceInfoId=1&suanfaId=1" http://28xiaomi.com/api/yuce/indexYuce > 17.json
rm -rf 7.json
mv 17.json 7.json
sleep 1

curl -d "gameId=5&yuceInfoId=7&suanfaId=1" http://28xiaomi.com/api/yuce/indexYuce > 18.json
rm -rf 8.json
mv 18.json 8.json
sleep 1

