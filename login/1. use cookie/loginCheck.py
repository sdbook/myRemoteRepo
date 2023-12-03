#!C:\Program Files\Python310\python.exe
# -*- coding: utf-8 -*-
#指定stdio輸出編碼為utf-8，以避免亂碼
import cgi
import sys
import os
import json
#處理stdio輸出編碼，以避免亂碼
sys.stdout.reconfigure(encoding='utf-8')


from http import cookies
C=cookies.SimpleCookie()

#嘗試取得登入的cookie
try:
	C.load(os.environ['HTTP_COOKIE'])
	loginRole=C['loginRole'].value #try to read the cookie
except:
	loginRole='0'
	
form = cgi.FieldStorage()
try:
	act=form.getvalue('act')
	id=form.getvalue('id')
	pwd=form.getvalue('pwd')
except:
	id=''
	pwd=''

msg=''

if act=='login':
	#sql="select name, role from user where id=%s and pwd=PASSWORD(%s);"
	#cur.execute(sql,(id,pwd))
	if (id=='1' and pwd=='2'):
		C['loginRole'] = '1'
	else:
		C['loginRole'] = '0'
	#set cookies options
	#C['loginRole']['path'] = '/'
	#C['loginRole']['SameSite'] = 'Strict'
	#C['loginRole']['HttpOnly'] = 'True'
	print(C) #send cookie
	msg="{}"
elif act=='showInfo':
	#檢查是否已登入
	if loginRole>'0':
		msg=f"You've logged in. Your role is {loginRole}."
	else:
		msg="You need login to use this funtion."

print("Content-Type: text/html; charset=utf-8\n") #send http header
print(msg)
