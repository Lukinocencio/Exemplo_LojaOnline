import pymysql
import os

sql_file = r'c:\www\Exemplo_LojaOnline\htdocs\BD\loja.sql\loja.sql'

try:
    connection = pymysql.connect(
        host='localhost',
        user='root',
        password='',
        autocommit=True
    )
    
    with connection.cursor() as cursor:
        with open(sql_file, 'r', encoding='utf-8') as f:
            sql_script = f.read()
            
        # Split by semicolon and execute
        commands = sql_script.split(';')
        for command in commands:
            try:
                if command.strip():
                    cursor.execute(command)
            except Exception as e:
                print(f"Error executing command: {e}")
                
    print("Database imported successfully!")
    
except Exception as e:
    print(f"Error: {e}")
