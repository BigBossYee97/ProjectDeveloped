import java.awt.*;
import java.awt.event.*;
import static java.lang.System.out;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import javax.swing.*;

public class Register extends JFrame implements ActionListener{
    JLabel Header = new JLabel("New User");
    JLabel Username = new JLabel("Username:");
    JLabel Password = new JLabel("Password:");
    JLabel ConfirmPassword = new JLabel("Confirm Password:");
    JLabel Email = new JLabel("Email:");
    JTextField UsernameTxt = new JTextField(15);
    JPasswordField PasswordTxt = new JPasswordField(15);
    JPasswordField ConfirmPasswordTxt = new JPasswordField(15);
    JTextField EmailTxt = new JTextField(15);
    JButton Register = new JButton("Register");
    JButton Reset = new JButton("Reset");
    JButton Exit = new JButton("Exit");
    JCheckBox TnC = new JCheckBox("I agree to T&C");
    DBHandler db = new DBHandler();
    
    Register(){
        setLayout(new BorderLayout());
        setSize(500,700);
        setResizable(false);
        setLocationRelativeTo(null);
        setTitle("Register Form");
        //setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        Header.setFont(new Font("Arial Black", Font.PLAIN,32));
        Username.setFont(new Font("Arial Black",Font.PLAIN,12));
        Password.setFont(new Font("Arial Black",Font.PLAIN,12));
        ConfirmPassword.setFont(new Font("Arial Black",Font.PLAIN,12));
        Email.setFont(new Font("Arial Black", Font.PLAIN,12));
        Register.setFont(new Font("Arial Black", Font.PLAIN,12));
        Reset.setFont(new Font("Arial Black", Font.PLAIN,12));
        Exit.setFont(new Font("Arial Black", Font.PLAIN,12));
        JPanel North = new JPanel();
        North.setLayout(new FlowLayout());
        North.add(Header);
        JPanel Center = new JPanel();
        Center.setLayout(new GridLayout(8,1));
        JPanel Center1 = new JPanel();
        Center1.setLayout(new FlowLayout(FlowLayout.CENTER));
        Username.setPreferredSize(new Dimension(130,40));
        Center1.add(Username);
        Center1.add(UsernameTxt);
        JPanel Center2 = new JPanel();
        Center2.setLayout(new FlowLayout(FlowLayout.CENTER));
        Password.setPreferredSize(new Dimension(130,40));
        Center2.add(Password);
        Center2.add(PasswordTxt);
        JPanel Center3 = new JPanel();
        Center3.setLayout(new FlowLayout(FlowLayout.CENTER));
        ConfirmPassword.setPreferredSize(new Dimension(130,40));
        Center3.add(ConfirmPassword);
        Center3.add(ConfirmPasswordTxt);
        JPanel Center4 = new JPanel();
        Center4.setLayout(new FlowLayout(FlowLayout.CENTER));
        Email.setPreferredSize(new Dimension(130,40));
        Center4.add(Email);
        Center4.add(EmailTxt);
        JPanel Center5 = new JPanel();
        Center5.setLayout(new FlowLayout(FlowLayout.CENTER));
        Center5.add(TnC);
        Center.add(Center1);
        Center.add(Center2);
        Center.add(Center3);
        Center.add(Center4);
        Center.add(Center5);
        
        
        JPanel South = new JPanel();
        South.setLayout(new GridLayout(0,1));
        JPanel South1 = new JPanel();
        South1.setLayout(new FlowLayout());
        Register.setPreferredSize(new Dimension(100,40));
        Reset.setPreferredSize(new Dimension(100,40));
        Exit.setPreferredSize(new Dimension(100,40));
        South1.add(Register);
        JPanel South2 = new JPanel();
        South2.setLayout(new FlowLayout());
        South2.add(Reset);
        South2.add(Exit);
        South.add(South1);
        South.add(South2);
        setVisible(true);
        add("North",North);
        add("Center",Center);
        add("South",South);
        
        UsernameTxt.addActionListener(this);
        PasswordTxt.addActionListener(this);
        ConfirmPasswordTxt.addActionListener(this);
        EmailTxt.addActionListener(this);
        Reset.addActionListener(this);
        Exit.addActionListener(this);
        Register.addActionListener(this);
        TnC.addActionListener(this);
        
    }
    
public void actionPerformed(ActionEvent e){
     
    if(e.getSource() == Register){
         
             String username = UsernameTxt.getText();
             String password = PasswordTxt.getText();
             String confirmpassword = ConfirmPasswordTxt.getText();
             String email = EmailTxt.getText();
             if(username.equals("") || password.equals("") || confirmpassword.equals("") || email.equals("")){
                 JOptionPane.showMessageDialog(null, "Please do not leave any blank empty.");
             }
             else{
             if(password.equals(confirmpassword)){
                 if(TnC.isSelected()){
             boolean ok = db.RegisterID(username,password,confirmpassword,email);
             }
                 else
             JOptionPane.showMessageDialog(null,"Please agree to the T&C.");
             }
             else{
             JOptionPane.showMessageDialog(null,"Please make sure Password is same with Confirm Password.");
             }
             }
             
         
         
             
     }
    
    if(e.getSource() == Exit){
        System.exit(0);
    }
    
    if(e.getSource() == Reset){
        UsernameTxt.setText("");
        PasswordTxt.setText("");
        ConfirmPasswordTxt.setText("");
        EmailTxt.setText("");
        TnC.setSelected(false);
    }
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

   
    public boolean RegisterID(String username,String password, String confirmpassword, String email) {  // method to insert record into the table Video
        String array[] = {username,password,confirmpassword,email};
        
        
        String writeString =
            "INSERT INTO UserID(Username,Password,Email) VALUES('"
            + array[0] + "', '" + array[1] + "', '" + array[3] +  "')";
        
        try {
             
            myStatement.executeUpdate(writeString);
            
        }
        
        catch (SQLException sqle) {
            JOptionPane.showMessageDialog(null,"Registered Fail!");
            return false; 
        }
        JOptionPane.showMessageDialog(null,"Congratulation. Your accound is registered!");
        return true; 
        
    }


        }

}

