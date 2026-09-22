import pymysql

try:
    connection = pymysql.connect(host='localhost', user='root', password='', database='loja', autocommit=True)
    with connection.cursor() as cursor:
        try:
            cursor.execute("ALTER TABLE clientes ADD COLUMN numero VARCHAR(20) NOT NULL AFTER endereco")
            print("Added 'numero' to 'clientes'.")
        except Exception as e:
            print(f"Error altering clientes: {e}")
        try:
            cursor.execute("ALTER TABLE vendas ADD COLUMN numero VARCHAR(20) NOT NULL AFTER endereco")
            print("Added 'numero' to 'vendas'.")
        except Exception as e:
            print(f"Error altering vendas: {e}")
except Exception as e:
    print(f"Connection Error: {e}")
