import React, {Component} from 'react';

import {
  StyleSheet,
  Text,
  View,
  TouchableOpacity,
  TextInput,
  ScrollView,
} from 'react-native';

export default class NovaDenuncia extends Component {

	constructor(props) {
    	super(props);

    //Alert.alert(this.state.urlFoto)

	}

  static navigationOptions = {
    title: 'Nova Denúncia',
    
    headerStyle: {
      backgroundColor: '#8aacb8',
   	},

    headerTintColor: '#fff',
  };

  quandoclica = () => {
    Alert.alert('Cadastro de denúncia feita com sucesso')
    this.props.navigation.navigate('TelaDenuncias')
  }
  

  render() {

      return (

        <View style={styles.container}>
        	<Text style={styles.textoreferencia}>
        		Endereço de Referência
        	</Text>

        	<View style={{flexDirection:"row"}}>
        		<Text style={styles.textorua}>
        			Rua:
        		</Text>
        		<TextInput
        		style={styles.caixarua} 
          		autoCapitalize="none"
          		underlineColorAndroid="rgba(0, 0, 0, 0)"
        		/>
        		<Text style={styles.textonumero}>
        			N°:
        		</Text>
        		<TextInput
        		style={styles.caixanumero} 
          		autoCapitalize="none"
          		underlineColorAndroid="rgba(0, 0, 0, 0)"
        		/>
        	</View>

        	<View style={{flexDirection:"row"}}>
        		<Text style={styles.textobairro}>
        			Bairro:
        		</Text>
        		<TextInput
        		style={styles.caixabairro} 
          		autoCapitalize="none"
          		underlineColorAndroid="rgba(0, 0, 0, 0)"
        		/>
        	</View>

        	<View style={{flexDirection:"row"}}>
        		<Text style={styles.textobairro}>
        			Descrição:
        		</Text>
        		<TextInput
        		style={styles.caixadesc} 
          		autoCapitalize="none"
          		underlineColorAndroid="rgba(0, 0, 0, 0)"
        		/>
        	</View>

        	<TouchableOpacity style={styles.botao1}>
	        	<Text style={styles.statusBarText}>
	        		Inserir Foto
	        	</Text>
	        </TouchableOpacity>

	        <TouchableOpacity style={styles.botao1}>
	        	<Text style={styles.statusBarText}>
	        		Problemas Relatados
	        	</Text>
	        </TouchableOpacity>

	        <TouchableOpacity style={styles.botao1} onPress={this.quandoclica}>
	        	<Text style={styles.statusBarText}>
	        		Salvar
	        	</Text>
	        </TouchableOpacity>

        </View>
      );
    }
  
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#FFF',
  },

  textoreferencia: {
  	textAlign: 'center',
    fontSize: 20,
    paddingTop: 30,
  },

  textorua: {
  	fontSize: 18,
  	marginTop: 20,
  	marginLeft: 20,
  },

  caixarua: {
  	alignSelf: 'stretch',
    textAlign: 'center',
    marginTop: 15,
    marginBottom: 10,
    marginLeft: 10,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 40,
    width: 180,
    borderRadius: 5,
    borderWidth: 1,
    borderColor: '#000',
    fontSize: 18,
  },

  textonumero: {
  	fontSize: 18,
  	marginTop: 20,
  	marginLeft: 0,
  },

  caixanumero: {
  	alignSelf: 'stretch',
    textAlign: 'center',
    marginTop: 15,
    marginBottom: 10,
    marginLeft: 10,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 40,
    width: 40,
    borderRadius: 5,
    borderWidth: 1,
    borderColor: '#000',
    fontSize: 18,
  },

  textobairro: {
  	fontSize: 18,
  	marginTop: 20,
  	marginLeft: 20,
  },

  caixabairro: {
  	alignSelf: 'stretch',
    textAlign: 'center',
    marginTop: 15,
    marginBottom: 10,
    marginLeft: 10,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 40,
    width: 260,
    borderRadius: 5,
    borderWidth: 1,
    borderColor: '#000',
    fontSize: 18,
  },

  caixadesc: {
  	alignSelf: 'stretch',
    textAlign: 'center',
    marginTop: 15,
    marginBottom: 10,
    marginLeft: 10,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 120,
    width: 230,
    borderRadius: 5,
    borderWidth: 1,
    borderColor: '#000',
    fontSize: 18,
  },

  botao1: {
  	alignSelf: 'stretch',
    marginTop: 10,
    marginLeft: 20,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 60,
    backgroundColor: '#8aacb8',
    borderRadius: 5,
    borderColor: '#000',
  },

  statusBarText: {
  	color: '#FFF',
    fontSize: 20,
    paddingTop: 15,
    textAlign: 'center',
  }

});

