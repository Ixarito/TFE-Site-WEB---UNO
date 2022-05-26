import mysql.connector

def check_credentials(nom, mdp) -> bool:
    query = """
        SELECT *
        FROM joueurs
        WHERE nom_joueur = %s AND mdp_joueur = %s
    """

    res = False

    with mysql.connector.connect(user="root", database="uno") as conn:
        cur = conn.cursor()
        cur.execute(query, [nom, mdp])

        for row in cur:
            res = True
    return res


def main():
    pass

if __name__ == "__main__":
    main()