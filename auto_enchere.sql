--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `mot_de_passe` varchar(255) NOT NULL
);

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `puissance` int(11) NOT NULL,
  `description` text,
  `prix_depart` float NOT NULL,
  `date_depart` datetime NOT NULL,
  `date_limite_de_fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id)
);

--
-- Structure de la table `encheres`
--

CREATE TABLE `encheres` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `prix_actuel` float NOT NULL,
  `date_enchere` datetime NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  FOREIGN KEY (id_vehicule) REFERENCES vehicules(id),
  FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id)
)