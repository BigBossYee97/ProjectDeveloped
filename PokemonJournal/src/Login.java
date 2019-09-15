import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import java.awt.Dimension;
import java.io.PrintStream;
import static java.lang.System.out;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import javax.swing.JOptionPane;

public class Login extends JFrame implements ActionListener {
    JLabel title = new JLabel ("LOGIN");
    JLabel username = new JLabel("Username: ");
    JLabel password = new JLabel("Password: ");
    JTextField usernameText = new JTextField(10);
    JPasswordField passwordText = new JPasswordField(10);
    JButton LoginBtn = new JButton("Login");
    DBHandler db = new DBHandler();
  
    public static void main(String[] args) {
        Login LoginPage = new Login();
    }
    
    public Login(){
        setLayout(new BorderLayout());
        setSize(400,300);
        setResizable(false);
        setLocationRelativeTo(null);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setTitle("Login Page");
        JPanel North = new JPanel();
        North.setLayout(new FlowLayout(FlowLayout.CENTER));
        title.setFont(new Font("Arial Black",Font.PLAIN,32));
        North.setBackground(Color.YELLOW);
        North.add(title);
        JPanel Center = new JPanel();
        Center.setLayout(new GridLayout(2,1));
        JPanel Center1 = new JPanel();
        Center1.setLayout(new FlowLayout(FlowLayout.CENTER));
        username.setFont(new Font("Arial Black",Font.PLAIN,12));
        username.setPreferredSize((new Dimension(80,50)));
        Center1.setBackground(Color.YELLOW);
        Center1.add(username);
        Center1.add(usernameText);
        Center.add(Center1);
        JPanel Center2 = new JPanel();
        Center2.setLayout(new FlowLayout(FlowLayout.CENTER));
        password.setFont(new Font("Arial Black",Font.PLAIN,12));
        password.setPreferredSize(new Dimension(80,10));
        Center2.setBackground(Color.YELLOW);
        Center2.add(password);
        Center2.add(passwordText);
        Center.add(Center2);
        JPanel South = new JPanel();
        South.setLayout(new FlowLayout(FlowLayout.CENTER));
        LoginBtn.setFont(new Font("Arial Black",Font.PLAIN,12));
        LoginBtn.setPreferredSize(new Dimension(80,30));
        South.setBackground(Color.YELLOW);
        South.add(LoginBtn);
        add("North",North);
        add("Center",Center);
        add("South",South);
        setVisible(true);
        
        LoginBtn.addActionListener(this);
        usernameText.addActionListener(this);
        passwordText.addActionListener(this);
        
        
    }
    
    public void actionPerformed(ActionEvent e){
        
        if(e.getSource() == LoginBtn){
            db.CheckID();
            
        }
        usernameText.setText(""); 
        passwordText.setText("");
    }
    


class DBHandler {
    private Statement myStatement;

    public DBHandler() {
        try { 
                
            Class.forName("net.ucanaccess.jdbc.UcanaccessDriver");
            String url = 
               "jdbc:ucanaccess://PokemonUserID.accdb";
        
            Connection PokemonUserID = DriverManager.getConnection(url, "admin", ""); 
            
            
             myStatement = PokemonUserID.createStatement();
             
            
        }
        
        catch (ClassNotFoundException cnfe) {
            out.println(cnfe);
        }
        catch (SQLException sqle) {
            out.println(sqle);
        }
    }

   
    public void CheckID() {
       
        try {
            String usernamestr = usernameText.getText();
            String passwordstr = passwordText.getText();
            boolean Checking = false;
            
            
            ResultSet results = myStatement.executeQuery
                ("SELECT Username,Password FROM UserID ORDER BY Username");
            while (results.next()) {
                String array[] = {results.getString("Username"),results.getString("Password")};
               
                if(usernamestr.equals(array[0]) && passwordstr.equals(array[1])){
                   Checking = true; 
                }
              
                     
            }
            
            if(Checking == false)
                JOptionPane.showMessageDialog(null,"Login Failed.","Alert",JOptionPane.INFORMATION_MESSAGE);
            else{
                JOptionPane.showMessageDialog(null,"Login Success.","Alert",JOptionPane.INFORMATION_MESSAGE);
                LoginBtn.setEnabled(false);
                usernameText.setEnabled(false);
                passwordText.setEnabled(false);
                new Option();
                dispose();
                
            }
            results.close();
        }
        catch (SQLException sqle) {
            out.println(sqle);
        }
    }


        }
    }

