import React, {Component} from 'react';

import {
  StyleSheet,
  Text,
  View,
  TouchableOpacity,
  TextInput,
  ScrollView,
  Alert,
} from 'react-native';

export default class Cadastro extends Component {

  constructor(props) {
      super(props);

    //Alert.alert(this.state.urlFoto)

  }

  static navigationOptions = {
    title: 'Novo Cadastro',
    
    headerStyle: {
      backgroundColor: '#8aacb8',
    },

    headerTintColor: '#fff',
  };

  quandoclica = () =>{
    Alert.alert('Cadastro feito com sucesso')
    this.props.navigation.navigate('Home')
  }

  render() {

      return (

        <View style={styles.container}>
          <Text style={styles.textoreferencia}>
            Novo Cadastro
          </Text>

          <View style={{flexDirection:"row"}}>
            <Text style={styles.textonome}>
              Nome:
            </Text>
            <TextInput
            style={styles.caixanome} 
              autoCapitalize="none"
              underlineColorAndroid="rgba(0, 0, 0, 0)"
            />
          </View>

          <View style={{flexDirection:"row"}}>
            <Text style={styles.textonome}>
              Email:
            </Text>
            <TextInput
            style={styles.caixaemail} 
              autoCapitalize="none"
              underlineColorAndroid="rgba(0, 0, 0, 0)"
              keyboardType="email-address"
            />
          </View>

          <View style={{flexDirection:"row"}}>
            <Text style={styles.textonome}>
              Nascimento:
            </Text>
            <TextInput
            style={styles.caixanasc} 
              autoCapitalize="none"
              underlineColorAndroid="rgba(0, 0, 0, 0)"
            />
          </View>

          <View style={{flexDirection:"row"}}>
            <Text style={styles.textonome}>
              CPF:
            </Text>
            <TextInput
            style={styles.caixacpf} 
              autoCapitalize="none"
              underlineColorAndroid="rgba(0, 0, 0, 0)"
              keyboardType = "numeric"
            />
          </View>

          <View style={{flexDirection:"row"}}>
            <Text style={styles.textonome}>
              Cidade:
            </Text>
            <TextInput
            style={styles.caixacidade} 
              autoCapitalize="none"
              underlineColorAndroid="rgba(0, 0, 0, 0)"
            />
            <Text style={styles.textouf}>
              UF:
            </Text>
            <TextInput
            style={styles.caixauf} 
              autoCapitalize="none"
              underlineColorAndroid="rgba(0, 0, 0, 0)"
            />
          </View>

          <View style={{flexDirection:"row"}}>
            <Text style={styles.textonome}>
              Senha:
            </Text>
            <TextInput
            style={styles.caixasenha} 
              autoCapitalize="none"
              underlineColorAndroid="rgba(0, 0, 0, 0)"
              secureTextEntry={true}
            />
          </View>

          <View style={{flexDirection:"row"}}>
            <Text style={styles.textonome}>
              Confirmar Senha:
            </Text>
            <TextInput
            style={styles.caixaconfirma} 
              autoCapitalize="none"
              underlineColorAndroid="rgba(0, 0, 0, 0)"
              secureTextEntry={true}
            />
          </View>

          <TouchableOpacity style={styles.botao1} onPress={this.quandoclica}>
            <Text style={styles.statusBarText}>
              Cadastrar
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
  },

  textonome: {
    fontSize: 18,
    marginTop: 20,
    marginLeft: 20,
  },

  textouf: {
    fontSize: 18,
    marginTop: 20,
  },

  caixanome: {
    alignSelf: 'stretch',
    textAlign: 'center',
    marginTop: 15,
    marginBottom: 10,
    marginLeft: 10,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 40,
    width: 250,
    borderRadius: 5,
    borderWidth: 1,
    borderColor: '#000',
    fontSize: 18,
  },

  caixaemail: {
    alignSelf: 'stretch',
    textAlign: 'center',
    marginTop: 15,
    marginBottom: 10,
    marginLeft: 10,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 40,
    width: 255,
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

  caixanasc: {
    alignSelf: 'stretch',
    textAlign: 'center',
    marginTop: 15,
    marginBottom: 10,
    marginLeft: 10,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 40,
    width: 200,
    borderRadius: 5,
    borderWidth: 1,
    borderColor: '#000',
    fontSize: 18,
  },

  caixacpf: {
    alignSelf: 'stretch',
    textAlign: 'center',
    marginTop: 15,
    marginBottom: 10,
    marginLeft: 10,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 40,
    width: 265,
    borderRadius: 5,
    borderWidth: 1,
    borderColor: '#000',
    fontSize: 18,
  },

  statusBarText: {
    color: '#FFF',
    fontSize: 20,
    paddingTop: 15,
    textAlign: 'center',
  },

  caixacidade: {
    alignSelf: 'stretch',
    textAlign: 'center',
    marginTop: 15,
    marginBottom: 10,
    marginLeft: 10,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 40,
    width: 130,
    borderRadius: 5,
    borderWidth: 1,
    borderColor: '#000',
    fontSize: 18,
  },

  caixauf: {
    alignSelf: 'stretch',
    textAlign: 'center',
    marginTop: 15,
    marginBottom: 10,
    marginLeft: 10,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 40,
    width: 60,
    borderRadius: 5,
    borderWidth: 1,
    borderColor: '#000',
    fontSize: 18,
  },

  caixasenha: {
    alignSelf: 'stretch',
    textAlign: 'center',
    marginTop: 15,
    marginBottom: 10,
    marginLeft: 10,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 40,
    width: 250,
    borderRadius: 5,
    borderWidth: 1,
    borderColor: '#000',
    fontSize: 18,
  },

  caixaconfirma: {
    alignSelf: 'stretch',
    textAlign: 'center',
    marginTop: 15,
    marginBottom: 10,
    marginLeft: 10,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 40,
    width: 160,
    borderRadius: 5,
    borderWidth: 1,
    borderColor: '#000',
    fontSize: 18,
  },

});

