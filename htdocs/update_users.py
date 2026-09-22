import pymysql

try:
    connection = pymysql.connect(host='localhost', user='root', password='', database='loja', autocommit=True)
    with connection.cursor() as cursor:
        try:
            # Update admin password in usuarios table
            # 'd033e22ae348aeb5660fc2140aec35850c4da997' is sha1('admin')
            cursor.execute("UPDATE usuarios SET senha='d033e22ae348aeb5660fc2140aec35850c4da997' WHERE login='admin'")
            print("Admin password updated to 'admin'.")
        except Exception as e:
            print(f"Error updating usuarios: {e}")
            
        try:
            # Update customer email and password in clientes table
            # '2e6f9b0d5885b6010f9167787445617f553a735f' is sha1('teste')
            cursor.execute("UPDATE clientes SET email='teste@gmail.com', senha='2e6f9b0d5885b6010f9167787445617f553a735f' WHERE cpf='111.111.111-11'")
            print("Customer credentials updated to 'teste@gmail.com' and 'teste'.")
        except Exception as e:
            print(f"Error updating clientes: {e}")
except Exception as e:
    print(f"Connection Error: {e}")
