#!C:\Program Files\Python310\python.exe
# -*- coding: utf-8 -*-
#指定stdio輸出編碼為utf-8，以避免亂碼
import cgi
import sys
#處理stdio輸出編碼，以避免亂碼
sys.stdout.reconfigure(encoding='utf-8')


from http import cookies
C=cookies.SimpleCookie()

form = cgi.FieldStorage()
try:
	id=form.getvalue('id')
	pwd=form.getvalue('pwd')
except:
	id=''
	pwd=''

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
print("Content-Type: text/html; charset=utf-8\n") #send http header

