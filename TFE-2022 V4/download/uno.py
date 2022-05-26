import random
from tkinter import *
from db import *


# liste des couleurs existants
couleurCarte = ('ROUGE','VERT','BLEU','JAUNE', 'VIOLET', 'GRIS')
# dict du rapport entre les coulers et leur valeur hex
couleurHex = {'ROUGE': '#ea323c','VERT':'#33984b','BLEU':'#0098dc','JAUNE':'#ffc825', 'VIOLET':'#a740e5', 'GRIS':'#9f9f9f'}
# valeurs sur la face avant des cartes
nbCarte = ('0','1','2','3','4','5','6','7','8','9','10','Skip','Reverse','Ajouter2','Ajouter3','Ajouter4','Joker', 'Retirer1', 'Retirer2')
# dict du rapport entre la valeur de la face avant avec leur type en db
typeCarte = {'0':'nombre','1':'nombre','2':'nombre','3':'nombre','4':'nombre',
             '5':'nombre','6':'nombre','7':'nombre','8':'nombre','9':'nombre',
             '10':'nombre','Skip':'action','Reverse':'action','Ajouter2':'action', 
             'Ajouter3':'action','Ajouter4':'action_sans_couleur',
             'Joker':'action_sans_couleur', 'Retirer1':'action', 'Retirer2':'action'}

class Card:

    def __init__(self, couleurCarte, nbCarte):
        self.nbCarte = nbCarte
        
        if typeCarte[nbCarte] == 'nombre':
            self.couleurCarte = couleurCarte
            self.cardtype = 'nombre'
        elif typeCarte[nbCarte] == 'action':
            self.couleurCarte = couleurCarte
            self.cardtype = 'action'
        else:
            self.couleurCarte = None
            self.cardtype = 'action_sans_couleur'

    #représentation textuelle d'une Card
    def __str__(self):
        if self.couleurCarte == None:
            return f"{self.nbCarte}"
        else:
            return f"{self.couleurCarte} {self.nbCarte}"


class Deck:

    def __init__(self):
        self.deck = []
        #Création d'un deck aléatoire a partir de la liste de Cards existantes pour chaque couleur
        self.init()

    #représentation textuelle d'un Deck
    def __str__(self):
        deck_comp = ''
        for card in self.deck:
            deck_comp += '\n' + card.__str__()
        return 'The deck has ' + deck_comp

    def shuffle(self):
        """
        appelle la fonction shuffle de random sur le Deck
        """
        random.shuffle(self.deck)

    def deal(self):
        """
        Retire la carte du haut du deck et la renvoie
        """
        if(len(self.deck) <= 0):
            self.init()
        return self.deck.pop()
    
    def init(self):
        for clr in couleurCarte:
            for ran in nbCarte:
                if typeCarte[ran] != 'action_sans_couleur':
                    self.deck.append(Card(clr, ran))
                    self.deck.append(Card(clr, ran))
                else:
                    self.deck.append(Card(clr, ran))


class Hand:

    def __init__(self):
        self.cards = []
        self.cardsstr = []
        self.nombre_cards = 0
        self.action_cards = 0

    def add_card(self, card):
        """
        Ajoute une carte à la Hand
        """
        self.cards.append(card)
        self.cardsstr.append(str(card))
        if card.cardtype == 'nombre':
            self.nombre_cards += 1
        else:
            self.action_cards += 1

    def __sub__(self, other):
        self.cards.remove(other)
        return self

    def __add__(self, other):
        self.cards.append(other)
        return self

    def remove_card(self, place):
        """
        retire une carte de la Hand
        """
        self.cardsstr.pop(place - 1)
        return self.cards.pop(place - 1)

    def remove_any(self):
        """
        Retire une carte au hasard de la Hand
        """
        return self.cards.pop()

    def __iter__(self):
        """
        Iterateur sur la Hand
        """
        return iter(self.cards)

    def cards_in_hand(self):
        """
        Affiche les cartes présentes dans la Hand
        """
        for i in range(len(self.cardsstr)):
            print(f' {i + 1}.{self.cardsstr[i]}')

    def single_card(self, place):
        """ 
        Renvoie la carte en haut de la Hand
        """
        return self.cards[place - 1]

    def no_of_cards(self):
        """
        Renvoie le montant de cartes dans la Hand
        """
        return len(self.cards)


def choose_first():
    """
    Choisis aléatoirement qui commence
    """
    if random.randint(0,1)==0:
        return 'Player'
    else:
        return 'Pc'


def single_card_check(top_card,card):
    """
    Vérifie qe la carte du joueur est valide en la comparant avec la carte du dessus
    """
    if card.couleurCarte==top_card.couleurCarte or top_card.nbCarte==card.nbCarte or card.cardtype=='action_sans_couleur':
        return True
    else:
        return False


#PC
def full_hand_check(hand,top_card):
    """
    Verifie que la hand ait une carte valide à jouer
    """
    for c in hand.cards:
        if c.couleurCarte==top_card.couleurCarte or c.nbCarte == top_card.nbCarte or c.cardtype=='action_sans_couleur':
            return hand.remove_card(hand.cardsstr.index(str(c))+1)
    else:
        return 'no card'


def win_check(hand):
    """ 
    Verifie si la main est gagnante
    """
    if len(hand.cards)==0:
        return True
    else:
        return False


def last_card_check(hand):
    """ 
    Verifie que la carte soit une carte d'action (Le jeu se finit avec une carte nombre)
    """
    for c in hand.cards:
        if c.cardtype!='nombre':
            return True
        else:
            return False


class Uno(Tk):
    def __init__(self):
        Tk.__init__(self)
        self.title('Jeu')     			# Titre de la fenêtre
        self.geometry('800x600')    	# Dimensions de la fenêtre largeur x hauteur
        self['bg'] = 'white'	    # Couleur du fond
        self.configure(background='#f0f0f0')
        self.resizable(False, False)
        self.attributes('-topmost', True)

        self.bienvenueText = Label(self, text = "Veuillez vous connecter", font = ('Arial', 20))
        self.bienvenueText.pack(pady=30)

        self.pseudo = StringVar()
        self.pseudoEntry = Entry(self, textvariable = self.pseudo, width = 30)
        self.pseudoEntry.pack(pady=10)

        self.password = StringVar()
        self.passwordEntry = Entry(self, textvariable = self.password, width = 30, show='*')
        self.passwordEntry.pack(pady=10)

        self.error = StringVar()
        self.errorText = Label(self, textvariable = self.error, font = ('Arial', 10))
        self.errorText.pack(pady=10)

        self.commencerJeu = Button(self, text='Jouer', command=self.login)
        self.commencerJeu.pack(pady=100)

        self.pc_frame = Frame(self)
        self.top_card_frame = Frame(self)
        self.player_frame = Frame(self)
        self.pull_frame = Frame(self)
        self.status_frame = Frame(self)

        self.status_message = StringVar()
        self.status_message.set('Bienvenue dans le jeu Uno!')
        self.status_label = Label(self, textvariable=self.status_message)


    def login(self):
        print(f'{self.pseudo.get()} {self.password.get()}')
        if(check_credentials(self.pseudo.get(), self.password.get())):
            self.commencerJeu.destroy()
            self.bienvenueText.destroy()
            self.pseudoEntry.destroy()
            self.passwordEntry.destroy()
            self.errorText.destroy()
            self.jeu()
        else:
            self.error.set('Mauvais identifiants')

    def refresh(self):
        self.pc_frame.destroy()
        self.top_card_frame.destroy()
        self.player_frame.destroy()
        self.pull_frame.destroy()

        if(self.playing):
            self.display_pc_hand()
            self.display_top_card()
            self.display_player_hand()
            self.display_pull()

        self.status_label.pack(pady=10, side = TOP)
        #pack label in center

    def play_card(self, card):
        print(card)
        self.status_message.set('Vous avez joué la carte: ' + str(card))
        self.tourJoueur(card)
        if(self.turn == "Pc"):
            self.tourBot()
        self.refresh()

    def pull(self):
        card = self.deck.deal()
        self.player_hand += card
        print('Vous avez pioché la carte: ' + str(card))
        self.tourBot()
        self.refresh()

    def display_pc_hand(self):
        self.pc_frame = Frame(self)
        self.pc_frame.configure(background="red")
        self.pc_hand_label = Label(self.pc_frame, text='PC Hand: ')

        self.pc_frame.pack(padx=10, pady=10)
        self.pc_hand_label.pack(side=TOP, padx=10, pady=10)

        for c in self.pc_hand:
            Label(self.pc_frame, text="X").pack(side=LEFT, padx=10, pady=10)

    def display_top_card(self):
        self.top_card_frame = Frame(self)
        self.top_card_frame.configure(background="blue")
        self.top_card_label = Label(self.top_card_frame, text='Top Card: ')

        self.top_card_frame.pack(padx=10, pady=10)
        self.top_card_label.pack(side=LEFT, padx=10, pady=10)

        Label(self.top_card_frame, text=self.top_card).pack(side=LEFT, padx=10, pady=10)


    def display_player_hand(self):
        self.player_frame = Frame(self, bg='#f0f0f0')
        self.player_frame.configure(background="green")
        self.player_hand_label = Label(self.player_frame, text='Player Hand: ')
        
        self.player_frame.pack(padx=10, pady=10)
        self.player_hand_label.pack(side=TOP, padx=10, pady=10)

        for c in self.player_hand:
            back = 'white'
            if c.couleurCarte is not None:
                back = couleurHex[c.couleurCarte.upper()]
            card = Button(self.player_frame, text = f"{str(c.couleurCarte)} { str(c.nbCarte)}", command=lambda c=c: self.play_card(c), bg=back)
            card.pack(side=LEFT)

    def display_pull(self):
        self.pull_frame = Frame(self)
        self.pull_frame.configure(background="yellow")

        self.pull_frame.pack(padx=10, pady=10)

        Label(self.pull_frame, text=self.turn).pack(side=LEFT, padx=10, pady=10)
        Button(self.pull_frame, text = 'Pull', command=self.pull).pack(side=RIGHT)

    def jeu(self):
        self.deck = Deck()
        self.deck.shuffle()

        self.player_hand = Hand()
        for i in range(7):
            self.player_hand.add_card(self.deck.deal())

        self.pc_hand = Hand()
        for i in range(7):
            self.pc_hand.add_card(self.deck.deal())

        self.top_card = self.deck.deal()
        if self.top_card.cardtype != 'nombre':
            while self.top_card.cardtype != 'nombre':
                self.top_card = self.deck.deal()
        self.status_message.set('\nStarting Card is: {}'.format(self.top_card))
        self.playing = True

        self.turn = choose_first()
        print(self.turn + ' will go first')
        if(self.turn == "Pc"):
            self.tourBot()

        self.refresh()

    def choose_color(self):
        self.choose_color_tk = Toplevel(self)
        self.choose_color_tk.grab_set()
        self.choose_color_tk.lift()
        self.choose_color_tk.focus_force()
        self.choose_color_tk.title('Choose Color')
        self.choose_color_tk.geometry('200x400')

        color_frame = Frame(self.choose_color_tk)
        color_frame.pack()

        for c in couleurCarte:
            Button(color_frame, text=c, command=lambda c=c: self.choose_color_callback(c), bg=couleurHex[c.upper()] ).pack(side=TOP)

    def choose_color_callback(self, color):
        self.color = color
        print(color)
        self.choose_color_tk.grab_release()
        self.choose_color_tk.destroy()


    def tourJoueur(self, card):
        """
        Définit le comportement du tour du joueur courant
        """
        self.choice = 'h'
        if self.choice == 'h':
            temp_card = card
            if single_card_check(self.top_card, temp_card):
                self.player_hand -= card
                self.top_card = card

                if temp_card.cardtype == 'nombre':
                    self.turn = 'Pc'
                else:
                    if temp_card.nbCarte == 'Skip':
                        self.turn = 'Player'
                    elif temp_card.nbCarte == 'Reverse':
                        self.turn = 'Player'
                    elif temp_card.nbCarte == 'Ajouter2':
                        self.pc_hand.add_card(self.deck.deal())
                        self.pc_hand.add_card(self.deck.deal())
                        self.turn = 'Player'
                    elif temp_card.nbCarte == 'Ajouter3':
                        self.pc_hand.add_card(self.deck.deal())
                        self.pc_hand.add_card(self.deck.deal())
                        self.pc_hand.add_card(self.deck.deal())
                        self.turn = 'Player' 
                    elif temp_card.nbCarte == 'Ajouter4':
                        for i in range(4):
                            self.pc_hand.add_card(self.deck.deal())

                        self.withdraw()
                        self.choose_color()
                        self.choose_color_tk.wait_window()
                        self.deiconify()

                        self.top_card.couleurCarte = self.color
                        self.turn = 'Player'
                    elif temp_card.nbCarte == 'Joker':

                        self.withdraw()
                        self.choose_color()
                        self.choose_color_tk.wait_window()
                        self.deiconify()

                        self.top_card.couleurCarte = self.color
                        self.turn = 'Pc'
                    elif temp_card.nbCarte == 'Retirer1':
                        self.player_hand.remove_any()
                        self.turn = 'Pc'
                    elif temp_card.nbCarte == 'Retirer2':
                        self.player_hand.remove_any()
                        self.player_hand.remove_any()
                        self.turn = 'Pc'

            else:
                self.status_message.set('This card cannot be used')

        if win_check(self.player_hand):
            self.status_message.set('\nPLAYER WON!!')
            self.playing = False

    def tourBot(self):
        """ 
        Définit le tour d'un ordinateur
        """
        # global turn
        # global playing
        # global victoire
        # global top_card
        
        if self.pc_hand.no_of_cards() == 1:
            if last_card_check(self.pc_hand):
                self.status_message.set('Adding a card to PC hand')
                self.pc_hand.add_card(self.deck.deal())
        temp_card = full_hand_check(self.pc_hand, self.top_card)
        if temp_card != 'no card':
            self.status_message.set(f'\nPC throws: {temp_card}')
            if temp_card.cardtype == 'nombre':
                self.top_card = temp_card
                self.turn = 'Player'
            else:
                if temp_card.nbCarte == 'Skip':
                    self.turn = 'Pc'
                    self.top_card = temp_card
                elif temp_card.nbCarte == 'Reverse':
                    self.turn = 'Pc'
                    self.top_card = temp_card
                elif temp_card.nbCarte == 'Ajouter2':
                    self.player_hand.add_card(self.deck.deal())
                    self.player_hand.add_card(self.deck.deal())
                    self.top_card = temp_card
                    self.turn = 'Pc'
                elif temp_card.nbCarte == 'Ajouter4':
                    for i in range(4):
                        self.player_hand.add_card(self.deck.deal())
                    self.top_card = temp_card
                    Ajouter4couleurCarte = self.pc_hand.cards[0].couleurCarte
                    self.status_message.set(f'couleurCarte changes to {Ajouter4couleurCarte}')
                    self.top_card.couleurCarte = Ajouter4couleurCarte
                    self.turn = 'Pc'
                elif temp_card.nbCarte == 'Joker':
                    self.top_card = temp_card
                    JokercouleurCarte = self.pc_hand.cards[0].couleurCarte
                    self.status_message.set(f"couleurCarte changes to {JokercouleurCarte}")
                    self.top_card.couleurCarte = JokercouleurCarte
                    self.turn = 'Player'

                elif temp_card.nbCarte == 'Retirer1':
                    self.pc_hand.remove_any()
                    self.turn = 'Player'
                elif temp_card.nbCarte == 'Retirer2':
                    self.pc_hand.remove_any()
                    self.pc_hand.remove_any()
                    self.turn = 'Player'
        else:
            self.status_message.set('PC pulls a card from deck')
            temp_card = self.deck.deal()
            if single_card_check(self.top_card, temp_card):
                self.status_message.set(f'PC throws: {temp_card}')
                if temp_card.cardtype == 'nombre':
                    self.top_card = temp_card
                    self.turn = 'Player'
                else:
                    if temp_card.nbCarte == 'Skip':
                        self.turn = 'Pc'
                        self.top_card = temp_card
                    elif temp_card.nbCarte == 'Reverse':
                        self.turn = 'Pc'
                        self.top_card = temp_card
                    elif temp_card.nbCarte == 'Ajouter2':
                        self.player_hand.add_card(self.deck.deal())
                        self.player_hand.add_card(self.deck.deal())
                        self.top_card = temp_card
                        self.turn = 'Pc'
                    elif temp_card.nbCarte == 'Ajouter3':
                        self.player_hand.add_card(self.deck.deal())
                        self.player_hand.add_card(self.deck.deal())
                        self.player_hand.add_card(self.deck.deal())
                        self.top_card = temp_card
                        self.turn = 'Pc'
                    elif temp_card.nbCarte == 'Ajouter4':
                        for i in range(4):
                            self.player_hand.add_card(self.deck.deal())
                        self.top_card = temp_card
                        Ajouter4couleurCarte = self.pc_hand.cards[0].couleurCarte
                        self.status_message.set(f'couleurCarte changes to {Ajouter4couleurCarte}')
                        self.top_card.couleurCarte = Ajouter4couleurCarte
                        self.turn = 'Pc'
                    elif temp_card.nbCarte == 'Joker':
                        self.top_card = temp_card
                        JokercouleurCarte = self.pc_hand.cards[0].couleurCarte
                        self.status_message.set(f'couleurCarte changes to {JokercouleurCarte}')
                        self.top_card.couleurCarte = JokercouleurCarte
                        self.turn = 'Player'
            else:
                self.status_message.set('PC doesnt have a card')
                self.pc_hand.add_card(temp_card)
                self.turn = 'Player'
        print('\nPC has {} cards remaining'.format(self.pc_hand.no_of_cards()))
        if win_check(self.pc_hand):
            self.status_message.set('\nPC WON!!')
            self.playing = False

def main():
    
    uno = Uno()     	 # Création fenêtre

    uno.mainloop()  	 # Boucle principale

if __name__ == "__main__":
    main()